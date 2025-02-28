---
title: Verifications
description: Interacting with Moneybird's Verifications API.
---

Manage verifications in Moneybird.

## Working with Verifications

This section covers how to interact with Moneybird's Verifications API. Verifications are used to validate email addresses, bank account numbers, chamber of commerce numbers, and tax numbers.

### Basic Operations

#### Get a Verification

Retrieve a verification by its ID.

```php
$verification = $client->verifications()->get('123456789');
```

#### List Verifications

Get a paginated list of verifications.

```php
$verifications = $client->verifications()->paginate();

// Iterate through the pages
foreach ($verifications as $verification) {
    // Process verification data
    if (isset($verification->emails)) {
        foreach ($verification->emails as $email) {
            echo "Verified email: $email";
        }
    }
}
```

#### Create a Verification

Create a new verification.

```php
$data = [
    'emails' => ['example@example.com'],
    'bank_account_numbers' => ['NL42TEST0000000002'],
    'chamber_of_commerce_number' => '12345678',
    'tax_number' => 'NL852924574B01'
];

$verification = $client->verifications()->create($data);
```

#### Update a Verification

Update an existing verification.

```php
$updateData = [
    'emails' => ['updated@example.com'],
];

$verification = $client->verifications()->update('123456789', $updateData);
```

#### Delete a Verification

Delete a verification.

```php
$client->verifications()->delete('123456789');
```

## Verification Properties

When working with verifications, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| emails | array | List of verified email addresses |
| bank_account_numbers | array | List of verified bank account numbers |
| chamber_of_commerce_number | string | Verified chamber of commerce number |
| tax_number | string | Verified tax number |

### Verification Status

The presence or absence of properties in the response indicates the verification status:

- If a property is present, the corresponding item has been verified
- If a property is absent, the verification is still pending or has not been initiated

For example, if the `emails` property is missing from the response, it means that no email addresses have been verified yet.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/verifications/) in the Moneybird developer docs
