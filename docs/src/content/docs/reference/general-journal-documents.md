---
title: General Journal Documents
description: Interacting with Moneybird's General Journal Documents API.
---

Manage your General Journal Documents in Moneybird.

## Working with General Journal Documents

This section covers how to interact with Moneybird's General Journal Documents API. You can create, retrieve, update, and delete general journal documents, as well as manage attachments.

### Basic Operations

#### Get a General Journal Document

Retrieve a general journal document by its ID.

```php
$generalJournalDocument = $client->generalJournalDocuments()->get('123456789');
```

#### List General Journal Documents

Get a paginated list of general journal documents.

```php
$generalJournalDocuments = $client->generalJournalDocuments()->paginate();

// Iterate through the pages
foreach ($generalJournalDocuments as $generalJournalDocument) {
    echo $generalJournalDocument->reference;
}
```

#### Get All General Journal Documents

Get all general journal documents at once.

```php
$allGeneralJournalDocuments = $client->generalJournalDocuments()->all();

// Iterate through all general journal documents
foreach ($allGeneralJournalDocuments as $generalJournalDocument) {
    echo $generalJournalDocument->reference;
}
```

#### Create a General Journal Document

Create a new general journal document.

```php
$data = [
    'reference' => 'Journal Entry #2025-001',
    'date' => '2025-03-01',
    'details_attributes' => [
        [
            'ledger_account_id' => '123456',
            'debit' => '1000.00',
            'description' => 'Debit entry'
        ],
        [
            'ledger_account_id' => '789012',
            'credit' => '1000.00',
            'description' => 'Credit entry'
        ]
    ]
];

$generalJournalDocument = $client->generalJournalDocuments()->create($data);
```

#### Update a General Journal Document

Update an existing general journal document.

```php
$updateData = [
    'reference' => 'Journal Entry #2025-001 - Updated',
    'date' => '2025-03-02'
];

$generalJournalDocument = $client->generalJournalDocuments()->update('123456789', $updateData);
```

#### Delete a General Journal Document

Delete a general journal document.

```php
$client->generalJournalDocuments()->delete('123456789');
```

### Working with Attachments

#### Add an Attachment to a General Journal Document

Add an attachment to a general journal document.

```php
$attachmentData = [
    'filename' => 'journal.pdf',
    'content' => base64_encode(file_get_contents('path/to/journal.pdf'))
];

$attachment = $client->generalJournalDocuments()->createAttachment('123456789', $attachmentData);
```

#### Delete an Attachment from a General Journal Document

Delete an attachment from a general journal document.

```php
$client->generalJournalDocuments()->deleteAttachment('123456789', 'attachment_id');
```

### Specialized Features

#### Synchronize General Journal Documents

Synchronize a list of general journal documents by their IDs.

```php
$ids = ['123456789', '987654321'];
$generalJournalDocuments = $client->generalJournalDocuments()->synchronize($ids);
```

## General Journal Document Properties

When working with general journal documents, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the document belongs to |
| contact_id | string | ID of the contact associated with the document |
| reference | string | Reference or name for the document |
| date | string | Date of the document (YYYY-MM-DD) |
| entry_number | string | Entry number in the administration |
| state | string | Current state of the document |
| origin | string | Origin of the document |
| details | array | Line items or details of the document (debits and credits) |
| payments | array | Payment information |
| notes | array | Notes attached to the document |
| attachments | array | Attachments linked to the document |
| events | array | Events related to the document |
| created_at | string | ISO 8601 timestamp of when the document was created |
| updated_at | string | ISO 8601 timestamp of when the document was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/documents/general_journal_documents/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/documents/general_journal_documents/) in the Moneybird developer docs
