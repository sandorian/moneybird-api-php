---
title: Subscription Templates
description: Interacting with Moneybird's Subscription Templates API.
---

Manage subscription templates in Moneybird.

## Working with Subscription Templates

This section covers how to interact with Moneybird's Subscription Templates API. You can create, retrieve, update, and delete subscription templates.

### Basic Operations

#### Get a Subscription Template

Retrieve a subscription template by its ID.

```php
$subscriptionTemplate = $client->subscriptionTemplates()->get('123456789');
```

#### List Subscription Templates

Get a paginated list of subscription templates.

```php
$subscriptionTemplates = $client->subscriptionTemplates()->paginate();

// Iterate through the pages
foreach ($subscriptionTemplates as $subscriptionTemplate) {
    echo $subscriptionTemplate->id;
}
```

#### Create a Subscription Template

Create a new subscription template.

```php
$data = [
    'workflow_id' => '123456789',
    'document_style_id' => '987654321',
    'mergeable' => false,
    'contact_can_update' => true,
    'products' => [
        [
            'description' => 'Premium Service',
            'price' => '29.99',
            'currency' => 'EUR',
            'frequency' => 1,
            'frequency_type' => 'month',
            'tax_rate_id' => '123456',
            'ledger_account_id' => '654321'
        ]
    ]
];

$subscriptionTemplate = $client->subscriptionTemplates()->create($data);
```

#### Update a Subscription Template

Update an existing subscription template.

```php
$updateData = [
    'document_style_id' => '123456789',
    'contact_can_update' => false
];

$subscriptionTemplate = $client->subscriptionTemplates()->update('123456789', $updateData);
```

#### Delete a Subscription Template

Delete a subscription template.

```php
$client->subscriptionTemplates()->delete('123456789');
```

## Subscription Template Properties

When working with subscription templates, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the template belongs to |
| workflow_id | string | ID of the workflow to use for the subscription |
| document_style_id | string | ID of the document style |
| mergeable | boolean | Whether the template can be merged with other templates |
| contact_can_update | boolean | Whether contacts can update their subscription |
| products | array | Products included in the subscription template |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/subscription_templates/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/subscription_templates/) in the Moneybird developer docs
