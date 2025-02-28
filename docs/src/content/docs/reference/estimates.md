---
title: Estimates
description: Interacting with Moneybird's Estimates API.
---

Manage your Estimates in Moneybird.

## Working with Estimates

This section covers how to interact with Moneybird's Estimates API. You can create, retrieve, update, and delete estimates, as well as change their state, send emails, and duplicate them.

### Basic Operations

#### Get an Estimate

Retrieve an estimate by its ID.

```php
$estimate = $client->estimates()->get('123456789');
```

#### List Estimates

Get a paginated list of estimates.

```php
$estimates = $client->estimates()->paginate();

// Iterate through the pages
foreach ($estimates as $estimate) {
    echo $estimate->estimate_id;
}
```

#### Create an Estimate

Create a new estimate.

```php
$data = [
    'contact_id' => '987654321',
    'estimate_date' => '2025-03-01',
    'due_date' => '2025-03-15',
    'reference' => 'EST-2025-001',
    'language' => 'en',
    'currency' => 'EUR',
    'discount' => '10',
    'details_attributes' => [
        [
            'description' => 'Web development services',
            'price' => '75.00',
            'amount' => '10',
            'tax_rate_id' => '123456'
        ]
    ]
];

$estimate = $client->estimates()->create($data);
```

#### Update an Estimate

Update an existing estimate.

```php
$updateData = [
    'reference' => 'EST-2025-001-UPDATED',
    'discount' => '15'
];

$estimate = $client->estimates()->update('123456789', $updateData);
```

#### Delete an Estimate

Delete an estimate.

```php
$client->estimates()->delete('123456789');
```

### Specialized Features

#### Change Estimate State

Change the state of an estimate (e.g., to 'open', 'accepted', 'rejected').

```php
$estimate = $client->estimates()->changeState('123456789', 'accepted');
```

#### Send Estimate by Email

Send an estimate to a contact by email.

```php
$emailData = [
    'recipient' => 'client@example.com',
    'subject' => 'Your estimate EST-2025-001',
    'body' => 'Please find your estimate attached.'
];

$estimate = $client->estimates()->sendEmail('123456789', $emailData);
```

#### Get Email Template

Get the email template for sending an estimate.

```php
$emailTemplate = $client->estimates()->getSendEmailTemplate('123456789');
```

#### Duplicate an Estimate

Create a duplicate of an existing estimate.

```php
$duplicateEstimate = $client->estimates()->duplicate('123456789');
```

#### Synchronize Estimates

Synchronize a list of estimates by their IDs.

```php
$ids = ['123456789', '987654321'];
$estimates = $client->estimates()->synchronize($ids);
```

## Estimate Properties

When working with estimates, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the estimate belongs to |
| contact_id | string | ID of the contact associated with the estimate |
| contact | array | Contact details |
| estimate_id | string | Human-readable estimate identifier |
| workflow_id | string | ID of the workflow used for this estimate |
| document_style_id | string | ID of the document style used |
| identity_id | string | ID of the identity used |
| state | string | Current state of the estimate (e.g., 'draft', 'open', 'accepted') |
| estimate_date | string | Date of the estimate (YYYY-MM-DD) |
| due_date | string | Due date of the estimate (YYYY-MM-DD) |
| reference | string | Your reference for this estimate |
| language | string | Language of the estimate |
| currency | string | Currency used in the estimate |
| discount | string | Discount percentage |
| details | array | Line items on the estimate |
| total_price_excl_tax | string | Total price excluding tax |
| total_price_incl_tax | string | Total price including tax |
| created_at | string | ISO 8601 timestamp of when the estimate was created |
| updated_at | string | ISO 8601 timestamp of when the estimate was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/estimates/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/estimates/) in the Moneybird developer docs
