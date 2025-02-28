---
title: Working with pagination
description: How to handle paginated responses from the Moneybird API.
---

## Introduction to Pagination in Moneybird

When working with the Moneybird API, you'll often need to retrieve collections of resources like contacts, invoices, or financial mutations. The Moneybird API limits the number of items returned in a single response to prevent performance issues. By default, each page contains up to 100 items.

## Pagination Support Across Endpoints

It's essential to understand that pagination is implemented differently across Moneybird API endpoints:

### Endpoints with True API Pagination

These endpoints support true pagination with `page` and `per_page` parameters:

- `contacts()` - Supports true API pagination through the `/contacts` endpoint
- `salesInvoices()` - Supports true API pagination through the `/sales_invoices` endpoint
- `recurringSalesInvoices()` - Supports true API pagination through the `/recurring_sales_invoices` endpoint
- `externalSalesInvoices()` - Supports true API pagination
- `estimates()` - Supports true API pagination
- `generalDocuments()` - Supports true API pagination
- `receipts()` - Supports true API pagination

### Endpoints Limited to 100 Records

For these endpoints, the `all()` method will only return up to 100 records. If you need more, use the synchronization API:

- `financialMutations()` - Limited to 100 records per the API documentation
- `payments()` - Limited records, requires synchronization for more
- `projects()` - Limited records, requires synchronization for more
- `purchaseTransactions()` - Limited records, requires synchronization for more
- `products()` - Limited records, requires synchronization for more

### Endpoints Without Pagination

These endpoints do not support pagination in the Moneybird API and will always return the full dataset:

- `ledgerAccounts()`
- `financialAccounts()`

## Using the SDK's Pagination Methods

This SDK mirrors the Moneybird API as closely as possible:

1. For endpoints with true API pagination, the SDK provides the `paginate()` method
2. For endpoints with limited records, the SDK provides both `all()` and synchronization methods

### Using the Paginator

The `paginate()` method returns a `MoneybirdPaginator` object that implements PHP's `Iterator` interface, allowing you to easily loop through all items across multiple pages:

```php
// Get a paginator for contacts, no requests are made yet
$contacts = $client->contacts()->paginate();

// Iterate through all contacts across all pages
foreach ($contacts as $contact) {
    echo $contact->company_name . "\n";
    // Process each contact
}
```

The paginator automatically handles fetching the next page of results when needed, so you don't have to worry about page numbers or making additional API calls manually.

### Using the All Method

For other endpoints, you can use the `all()` method to retrieve a collection of records in a single request:

```php
// Getting all items at once (simpler but may be inefficient for large datasets)
$allFinancialMutations = $client->financialMutations()->all();
```

### Using the Synchronization API

For some endpoints, you should use the synchronization API to retrieve more data:

```php
// Step 1: Get IDs and versions for synchronization
// This returns an array of IdVersion objects with id and version properties
$idVersions = $client->financialMutations()->synchronization();

// Step 2: Check what mutations need updating in your system
$idsToUpdate = array_filter($idVersions, function($idVersion) use ($knownVersion) {
    // Compare $idVersion->version with your stored version
    // Return true if the version is newer and needs updating
    return $idVersion->version > $knownVersion;
});

$idsToFetch = array_map(fn($idVersion) => $idVersion->id, $idsToUpdate);

// Step 3: Fetch only the records that need updating
// Returns a maximum of 100 financial mutations, even if more ids are provided.
$client->financialMutations()->synchronize($idsToFetch);
```

## Best Practices

1. **Use Pagination for Large Collections**: When available, always use the `paginate()` method when dealing with potentially large collections of items.

2. **Avoid Unnecessary Iterations**: If you only need to process a few items, consider using filters to reduce the dataset before pagination.

3. **Handle Rate Limits**: Be aware that each page request counts toward your API rate limits. If you're processing many pages, consider adding delays between requests.

4. **Error Handling**: Implement proper error handling to deal with potential API errors during pagination:

## Example: Exporting All Contacts to CSV

Here's a practical example of using pagination to export all contacts to a CSV file:

```php
// Open a file for writing
$file = fopen('contacts_export.csv', 'w');

// Write CSV header
fputcsv($file, ['ID', 'Company Name', 'First Name', 'Last Name', 'Email', 'Phone']);

try {
    // Get paginator for contacts
    $contacts = $client->contacts()->paginate();

    // Iterate through all pages of contacts
    foreach ($contacts as $contact) {
        fputcsv($file, [
            $contact->id,
            $contact->company_name ?? '',
            $contact->firstname ?? '',
            $contact->lastname ?? '',
            $contact->email ?? '',
            $contact->phone ?? '',
        ]);
    }
} catch (\Exception $e) {
    echo "Error exporting contacts: " . $e->getMessage();
}

// Close the file
fclose($file);

echo "Export complete!";
```

This example efficiently processes all contacts regardless of how many there are, writing them to a CSV file one page at a time.
