---
title: Products
description: Interacting with Moneybird's Products API.
---

Manage your Products in Moneybird.

## Working with Products

This section covers how to interact with Moneybird's Products API. You can create, retrieve, update, and delete products, as well as synchronize product data.

### Basic Operations

#### Get a Product

Retrieve a product by its ID.

```php
$product = $client->products()->get('123456789');
```

#### List Products

Get a paginated list of products.

```php
$products = $client->products()->paginate();

// Iterate through the pages
foreach ($products as $product) {
    echo $product->title . ': ' . $product->price;
}
```

#### Get All Products

Get all products at once.

```php
$allProducts = $client->products()->all();

// Iterate through all products
foreach ($allProducts as $product) {
    echo $product->title . ': ' . $product->price;
}
```

#### Create a Product

Create a new product.

```php
$data = [
    'title' => 'Web Development',
    'description' => 'Custom web development services',
    'price' => '85.00',
    'tax_rate_id' => '123456',
    'ledger_account_id' => '789012',
    'active' => true
];

$product = $client->products()->create($data);
```

#### Update a Product

Update an existing product.

```php
$updateData = [
    'title' => 'Web Development Premium',
    'price' => '95.00',
    'description' => 'Premium web development services'
];

$product = $client->products()->update('123456789', $updateData);
```

#### Delete a Product

Delete a product.

```php
$client->products()->delete('123456789');
```

### Synchronization

#### Get Synchronization List

Get a list of product IDs and version timestamps for synchronization.

```php
$syncList = $client->products()->synchronization();

foreach ($syncList as $item) {
    echo $item->id . ' (version: ' . $item->version . ')';
}
```

#### Synchronize Products

Synchronize products by providing an array of IDs.

```php
$productIds = ['123456789', '987654321'];
$syncedProducts = $client->products()->synchronize($productIds);

foreach ($syncedProducts as $product) {
    echo $product->title;
}
```

## Product Properties

When working with products, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the product belongs to |
| title | string | Title of the product |
| description | string | Description of the product |
| identifier | string | Product identifier or SKU |
| price | string | Price of the product |
| tax_rate_id | string | ID of the tax rate applied to the product |
| ledger_account_id | string | ID of the ledger account for this product |
| active | boolean | Whether the product is active |
| created_at | string | ISO 8601 timestamp of when the product was created |
| updated_at | string | ISO 8601 timestamp of when the product was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/products/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/products/) in the Moneybird developer docs
