# Changelog

All notable changes to `sandorian/moneybird-api-php` will be documented in this file.

## v0.2.3 - 2025-11-27

### What's Changed

* [Fix] Body of LinkBookingToFinancialMutationRequest does not have to be encapsulated by @jorisvanandel in https://github.com/sandorian/moneybird-api-php/pull/45

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/compare/v0.2.2...v0.2.3

## v0.2.2 - 2025-11-25

### What's Changed

* Make discount property of sales invoice nullable by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/35
* Make draft_id property of sales invoice nullable by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/36
* [Fix] Use PATCH method for LinkBookingToFinancialMutationRequest by @jorisvanandel in https://github.com/sandorian/moneybird-api-php/pull/43

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/compare/v0.2.1...v0.2.2

## v0.2.1 - 2025-05-01

Courtesy of @jeffreyvanhees 😎 .

### What's Changed

* Contact's lastname should be nullable by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/32
* Fix createDtoFromResponse for GetTaxRatesPageRequest.php by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/34
* Let total_discount of SalesInvoice accept int and string  by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/31
* Let `tax_number_valid` of Contact accept boolean and string by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/30

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/compare/v0.2.0...v0.2.1

## v0.2.0 - 2025-04-28

### What's Changed

* Fix pagination for recurring sales invoices by @stayallive in https://github.com/sandorian/moneybird-api-php/pull/27
* Make `tax_number_valid` boolean by @jeffreyvanhees in https://github.com/sandorian/moneybird-api-php/pull/25
* Feature: add default rate limiter by @sandervanhooft in https://github.com/sandorian/moneybird-api-php/pull/29

### New Contributors

* @stayallive made their first contribution in https://github.com/sandorian/moneybird-api-php/pull/27
* @jeffreyvanhees made their first contribution in https://github.com/sandorian/moneybird-api-php/pull/25

Feedback and contributions are welcome.

### Important Notes

- This is an alpha release and subject to breaking changes.
  
- Actively evolving: **we strongly recommend pinning your installation** to avoid unexpected issues:
  
  ```json
  "require": {
      "sandorian/moneybird-api-php": "^0.1.0"
  }
  
  
  
  
  
  ```

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/compare/v0.1.1...v0.2.0

## v0.1.1 - 2025-04-16

### What's Changed

* Add link header rfc5988 parser for Moneybird pagination links by @sandervanhooft in https://github.com/sandorian/moneybird-api-php/pull/24

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/compare/v0.1.0...v0.1.1

## v0.1.0-alpha - 2025-04-09

### What's Changed

**Full Changelog**: https://github.com/sandorian/moneybird-api-php/commits/v0.1.0-alpha
