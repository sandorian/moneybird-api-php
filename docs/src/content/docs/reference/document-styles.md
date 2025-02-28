---
title: Document Styles
description: Interacting with Moneybird's Document Styles API.
---

Manage your Document Styles in Moneybird.

## Working with Document Styles

This section covers how to interact with Moneybird's Document Styles API. You can retrieve document styles information.

### Basic Operations

#### Get a Document Style

Retrieve a document style by its ID.

```php
$documentStyle = $client->documentStyles()->get('123456789');
```

#### List Document Styles

Get a list of all document styles.

```php
$documentStyles = $client->documentStyles()->all();

// Iterate through the document styles
foreach ($documentStyles as $documentStyle) {
    echo $documentStyle->name;
}
```

## Document Style Properties

When working with document styles, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the document style belongs to |
| name | string | Name of the document style |
| identity_id | string | ID of the identity associated with this style |
| default | boolean | Whether this is the default document style |
| logo_hash | string | Hash of the logo image |
| logo_container_full_width | boolean | Whether the logo container uses full width |
| logo_display_width | string | Display width of the logo |
| logo_position | string | Position of the logo on the document |
| background_hash | string | Hash of the background image |
| paper_size | string | Size of the paper (e.g., 'a4') |
| address_position | string | Position of the address on the document |
| font_family | string | Font family used in the document |
| color | string | Primary color used in the document |
| language | string | Language of the document |
| created_at | string | ISO 8601 timestamp of when the document style was created |
| updated_at | string | ISO 8601 timestamp of when the document style was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/document_styles/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/document_styles/) in the Moneybird developer docs
