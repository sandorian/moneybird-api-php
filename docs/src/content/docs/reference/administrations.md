---
title: Administrations
description: Interacting with Moneybird's Administrations API.
---

Manage your Administrations in Moneybird.

## Working with Administrations

This section covers how to interact with Moneybird's Administrations API. You can retrieve administration information.

:::note
The operations in this section ignore the `administrationId` as set when instantiating the MoneybirdApiClient.
:::

### Basic Operations

#### Get an Administration

Retrieve an administration by its ID.

```php
$administration = $client->administrations()->get('123456789');
```

#### List Administrations

Get a list of all administrations.

```php
$administrations = $client->administrations()->all();

// Iterate through the administrations
foreach ($administrations as $administration) {
    echo $administration->name;
}
```

## Administration Properties

When working with administrations, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| name | string | Name of the administration |
| language | string | Language setting for the administration (e.g., 'nl', 'en') |
| currency | string | Currency used in the administration (e.g., 'EUR') |
| country | string | Country code for the administration (e.g., 'NL') |
| time_zone | string | Time zone setting for the administration |
| created_at | string | ISO 8601 timestamp of when the administration was created |
| updated_at | string | ISO 8601 timestamp of when the administration was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/administrations/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/administrations/) in the Moneybird developer docs
