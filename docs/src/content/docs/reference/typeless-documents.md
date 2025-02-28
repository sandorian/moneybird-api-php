---
title: Typeless Documents
description: Interacting with Moneybird's Typeless Documents API.
---

Manage typeless documents in Moneybird.

## Working with Typeless Documents

Typeless documents are documents of which the type is not yet known. For example, a document uploaded via email or via the bulk uploader. It is not possible to update a typeless document, except for adding attachments. You will need to set its type first.

### Basic Operations

#### Get a Typeless Document

Retrieve a typeless document by its ID.

```php
$typelessDocument = $client->typelessDocuments()->get('123456789');
```

#### List Typeless Documents

Get a paginated list of typeless documents.

```php
$typelessDocuments = $client->typelessDocuments()->paginate();

// Iterate through the pages
foreach ($typelessDocuments as $typelessDocument) {
    echo $typelessDocument->reference . ': ' . $typelessDocument->date;
}
```

#### Get All Typeless Documents

Get all typeless documents without pagination.

```php
$allTypelessDocuments = $client->typelessDocuments()->all();
```

#### Create a Typeless Document

Create a new typeless document.

```php
$data = [
    'reference' => '20230001',
    'date' => '2023-01-15',
];

$typelessDocument = $client->typelessDocuments()->create($data);
```

#### Delete a Typeless Document

Delete a typeless document.

```php
$client->typelessDocuments()->delete('123456789');
```

### Synchronization

#### Get IDs for Synchronization

Get a list of typeless document IDs and versions for synchronization.

```php
$idVersions = $client->typelessDocuments()->synchronization();
```

#### Synchronize Typeless Documents

Fetch typeless documents with given IDs.

```php
$ids = ['123456789', '987654321'];
$typelessDocuments = $client->typelessDocuments()->synchronize($ids);
```

### Working with Attachments

#### Add Attachment to Typeless Document

Add an attachment to a typeless document.

```php
$attachmentData = [
    'file' => base64_encode(file_get_contents('/path/to/file.pdf')),
    'filename' => 'file.pdf',
];

$result = $client->typelessDocuments()->createAttachment('123456789', $attachmentData);
```

#### Delete Attachment

Delete an attachment from a typeless document.

```php
$client->typelessDocuments()->deleteAttachment('123456789', 'attachment_id');
```

## Typeless Document Properties

When working with typeless documents, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the document belongs to |
| contact_id | string | ID of the contact associated with the document (optional) |
| reference | string | Reference number or code for the document |
| date | string | Date of the document (YYYY-MM-DD) |
| due_date | string | Due date of the document (YYYY-MM-DD) if applicable |
| entry_number | string | Entry number of the document |
| state | string | Current state of the document (e.g., "new") |
| currency | string | Currency code (e.g., "EUR") |
| exchange_rate | string | Exchange rate if not using the default currency |
| prices_are_incl_tax | string | Whether prices include tax |
| origin | string | Origin of the document |
| paid_at | string | Date when the document was paid (if applicable) |
| total_price_excl_tax | string | Total price excluding tax |
| total_price_incl_tax | string | Total price including tax |
| details | array | Line item details |
| payments | array | Payment information |
| notes | array | Notes associated with the document |
| attachments | array | Attachments associated with the document |
| events | array | Events related to the document |
| created_at | string | ISO 8601 timestamp of when the document was created |
| updated_at | string | ISO 8601 timestamp of when the document was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/documents_typeless_documents/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/documents_typeless_documents/) in the Moneybird developer docs
