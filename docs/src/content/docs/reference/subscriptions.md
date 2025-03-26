---
title: Subscriptions
description: Interacting with Moneybird's Subscriptions API.
---

Manage subscriptions in Moneybird.

## Working with Subscriptions

This section covers how to interact with Moneybird's Subscriptions API. You can create, retrieve, update, and delete subscriptions, as well as perform various actions such as pausing, resuming, and duplicating.

### Basic Operations

#### Get a Subscription

Retrieve a subscription by its ID.

```php
$subscription = $client->subscriptions()->get('123456789');
```

#### List Subscriptions

Get a paginated list of subscriptions.

```php
$subscriptions = $client->subscriptions()->paginate();

// Iterate through the pages
foreach ($subscriptions as $subscription) {
    echo $subscription->reference . ': ' . $subscription->frequency_type;
}
```

#### Create a Subscription

Create a new subscription.

```php
$data = [
    'contact_id' => '123456789',
    'product_id' => '987654321',
    'reference' => 'Monthly Service',
    'start_date' => '2023-01-01',
    'discount' => '10',
    'amount' => '1x'
];

$subscription = $client->subscriptions()->create($data);
```

#### Update a Subscription

Update an existing subscription.

```php
$updateData = [
    'reference' => 'Updated Monthly Service',
    'discount' => '15'
];

$subscription = $client->subscriptions()->update('123456789', $updateData);
```

#### Delete a Subscription

Delete a subscription.

```php
$client->subscriptions()->delete('123456789');
```

### Subscription Actions

#### Pause a Subscription

Pause an active subscription.

```php
$subscription = $client->subscriptions()->pause('123456789');
```

#### Resume a Subscription

Resume a paused subscription.

```php
$subscription = $client->subscriptions()->resume('123456789');
```

#### Reactivate a Subscription

Reactivate a cancelled subscription.

```php
$subscription = $client->subscriptions()->reactivate('123456789');
```

#### Duplicate a Subscription

Create a duplicate of a subscription.

```php
$duplicateSubscription = $client->subscriptions()->duplicate('123456789');
```

## Subscription Properties

When working with subscriptions, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the subscription belongs to |
| start_date | string | Date when the subscription starts |
| end_date | string | Date when the subscription ends (null if ongoing) |
| frequency | int | Frequency number (e.g., 1, 3, 6) |
| frequency_type | string | Frequency unit (e.g., 'month', 'year') |
| reference | string | Reference text for the subscription |
| cancelled_at | string | Date when the subscription was cancelled (null if active) |
| product_id | string | ID of the product associated with the subscription |
| product | array | Product information |
| contact_id | string | ID of the contact associated with the subscription |
| contact | array | Contact information |
| contact_person_id | string | ID of the contact person |
| contact_person | array | Contact person information |
| subscription_products | array | Products included in the subscription |
| recurring_sales_invoice_id | string | ID of the recurring sales invoice |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/subscriptions/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/subscriptions/) in the Moneybird developer docs
