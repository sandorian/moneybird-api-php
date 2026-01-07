# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP wrapper for the Moneybird API built on the Saloon PHP HTTP client framework. It provides type-safe access to all Moneybird API endpoints with full support for pagination, synchronization, and rate limiting.

## Architecture

- **Base API Client**: `src/Api/MoneybirdApiClient.php` - Main entry point
- **Endpoints**: Each resource has its own folder in `src/Api/` with an `Endpoint` class and request classes
- **Request Classes**: Inherit from base classes in `src/Api/Support/` (BaseJsonGetRequest, BaseJsonPostRequest, etc.)
- **DTOs**: Data transfer objects for type-safe responses in `src/Dto/`

### Key Patterns

```
src/Api/
├── {Resource}/
│   ├── {Resource}Endpoint.php     # Main endpoint with methods
│   ├── Requests/
│   │   ├── Get{Resource}Request.php
│   │   ├── Create{Resource}Request.php
│   │   └── ...
```

## Common Commands

```bash
# Run tests
composer test

# Run static analysis
composer analyse

# Fix code style
composer fix-style

# Run all checks
composer test && composer analyse
```

## Official Moneybird OpenAPI Specification

The official OpenAPI spec is available at:
```
https://raw.githubusercontent.com/moneybird/openapi/refs/heads/main/openapi.yml
```

### Periodic Sync

Pull the OpenAPI spec periodically and save with a dated filename:
```bash
curl -s https://raw.githubusercontent.com/moneybird/openapi/refs/heads/main/openapi.yml \
  -o openapi-specs/openapi-$(date +%Y-%m-%d).yml
```

The `openapi-specs/` directory contains dated versions of the spec for reference and comparison.

### Current Spec Version

- **File**: `openapi-specs/openapi-2025-01-07.yml`
- **API Version**: v2-20251223-d1277b6a05
- **Base URL**: https://moneybird.com/api/v2

## Implementation Status

See `OPENAPI-BACKLOG.md` for a detailed comparison between this library and the official OpenAPI spec, including:
- Missing endpoints that need implementation
- Missing methods on existing resources
- Potential improvements

## Rate Limiting

The API has a rate limit of 150 requests per 5 minutes. This is handled automatically by the Saloon rate limit plugin.

## Testing

Tests are in `tests/` using Pest PHP. Run with `composer test`.
