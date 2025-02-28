---
title: External Sales Invoice Attachments
description: Interacting with Moneybird's External Sales Invoice Attachments API.
---

Manage attachments for external sales invoices in Moneybird.

## Working with External Sales Invoice Attachments

This section covers how to interact with Moneybird's External Sales Invoice Attachments API. These attachments are files that can be associated with external sales invoices, such as PDF invoices or supporting documents.

### Basic Operations

#### Create an Attachment for an External Sales Invoice

Upload a file as an attachment to an external sales invoice.

```php
$externalSalesInvoiceId = '123456789';
$filePath = '/path/to/your/file.pdf';
$fileName = 'invoice.pdf';

$success = $client->externalSalesInvoiceAttachments()->createForExternalSalesInvoiceId(
    $externalSalesInvoiceId,
    $filePath,
    $fileName
);

if ($success) {
    echo "Attachment successfully uploaded!";
} else {
    echo "Failed to upload attachment.";
}
```

### Parameters

When creating an attachment for an external sales invoice, you need to provide the following parameters:

| Parameter | Type | Description |
|-----------|------|-------------|
| externalSalesInvoiceId | string | The ID of the external sales invoice to attach the file to |
| filePath | string | The path to the file on your local system |
| fileName | string | The name to give the file in Moneybird |

### Response

The `createForExternalSalesInvoiceId` method returns a boolean value:

- `true` if the attachment was successfully created
- `false` if there was an error

## Further reading

- See the [External Sales Invoices](/reference/external-sales-invoices/) documentation for more information on working with external sales invoices
