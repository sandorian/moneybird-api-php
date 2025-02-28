---
title: General Documents
description: Interacting with Moneybird's General Documents API.
---

Manage your General Documents in Moneybird.

## Working with General Documents

This section covers how to interact with Moneybird's General Documents API. You can create, retrieve, update, and delete general documents, as well as manage attachments.

### Basic Operations

#### Get a General Document

Retrieve a general document by its ID.

```php
$generalDocument = $client->generalDocuments()->get('123456789');
```

#### List General Documents

Get a paginated list of general documents.

```php
$generalDocuments = $client->generalDocuments()->paginate();

// Iterate through the pages
foreach ($generalDocuments as $generalDocument) {
    echo $generalDocument->reference;
}
```

#### Get All General Documents

Get all general documents at once.

```php
$allGeneralDocuments = $client->generalDocuments()->all();

// Iterate through all general documents
foreach ($allGeneralDocuments as $generalDocument) {
    echo $generalDocument->reference;
}
```

#### Create a General Document

Create a new general document.

```php
$data = [
    'contact_id' => '123456789',
    'reference' => 'Document #2025-001',
    'date' => '2025-03-01',
    'due_date' => '2025-03-15',
    'details_attributes' => [
        [
            'description' => 'Service rendered',
            'amount' => '100.00'
        ]
    ]
];

$generalDocument = $client->generalDocuments()->create($data);
```

#### Update a General Document

Update an existing general document.

```php
$updateData = [
    'reference' => 'Document #2025-001 - Updated',
    'due_date' => '2025-03-20'
];

$generalDocument = $client->generalDocuments()->update('123456789', $updateData);
```

#### Delete a General Document

Delete a general document.

```php
$client->generalDocuments()->delete('123456789');
```

### Working with Attachments

#### Add an Attachment to a General Document

Add an attachment to a general document.

```php
$attachmentData = [
    'filename' => 'document.pdf',
    'content' => base64_encode(file_get_contents('path/to/document.pdf'))
];

$attachment = $client->generalDocuments()->createAttachment('123456789', $attachmentData);
```

#### Delete an Attachment from a General Document

Delete an attachment from a general document.

```php
$client->generalDocuments()->deleteAttachment('123456789', 'attachment_id');
```

### Specialized Features

#### Synchronize General Documents

Synchronize a list of general documents by their IDs.

```php
$ids = ['123456789', '987654321'];
$generalDocuments = $client->generalDocuments()->synchronize($ids);
```

## General Document Properties

When working with general documents, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the document belongs to |
| contact_id | string | ID of the contact associated with the document |
| contact_person_id | string | ID of the contact person associated with the document |
| reference | string | Reference or name for the document |
| date | string | Date of the document (YYYY-MM-DD) |
| due_date | string | Due date of the document (YYYY-MM-DD) |
| entry_number | string | Entry number in the administration |
| state | string | Current state of the document |
| exchange_rate | string | Exchange rate if applicable |
| details | array | Line items or details of the document |
| payments | array | Payment information |
| notes | array | Notes attached to the document |
| attachments | array | Attachments linked to the document |
| events | array | Events related to the document |
| created_at | string | ISO 8601 timestamp of when the document was created |
| updated_at | string | ISO 8601 timestamp of when the document was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/documents/general_documents/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/documents/general_documents/) in the Moneybird developer docs
