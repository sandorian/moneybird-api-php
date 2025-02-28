---
title: Identities
description: Interacting with Moneybird's Identities API.
---

Manage your Identities in Moneybird.

## Working with Identities

This section covers how to interact with Moneybird's Identities API. You can retrieve identity information for your Moneybird account.

### Basic Operations

#### Get an Identity

Retrieve an identity by its ID.

```php
$identity = $client->identities()->get('123456789');
```

#### List Identities

Get a paginated list of identities.

```php
$identities = $client->identities()->paginate();

// Iterate through the pages
foreach ($identities as $identity) {
    echo $identity->company_name;
}
```

#### Get All Identities

Get all identities at once.

```php
$allIdentities = $client->identities()->all();

// Iterate through all identities
foreach ($allIdentities as $identity) {
    echo $identity->company_name;
}
```

## Identity Properties

When working with identities, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the identity belongs to |
| company_name | string | Name of the company |
| city | string | City of the company address |
| country | string | Country of the company address |
| zipcode | string | Postal code of the company address |
| address1 | string | First line of the company address |
| address2 | string | Second line of the company address |
| email | string | Email address of the company |
| phone | string | Phone number of the company |
| delivery_method | string | Preferred delivery method |
| customer_id | string | Customer ID for reference |
| tax_number | string | Tax identification number |
| chamber_of_commerce | string | Chamber of commerce registration number |
| bank_account | string | Bank account information |
| attention | string | Attention line for addressing |
| custom_fields | array | Custom fields associated with the identity |
| tax_rates | array | Tax rates associated with the identity |
| created_at | string | ISO 8601 timestamp of when the identity was created |
| updated_at | string | ISO 8601 timestamp of when the identity was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/identities/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/identities/) in the Moneybird developer docs
