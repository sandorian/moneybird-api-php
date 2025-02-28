---
title: Users
description: Interacting with Moneybird's Users API.
---

Retrieve information about users in your Moneybird administration.

## Working with Users

This section covers how to interact with Moneybird's Users API. You can retrieve information about users in your Moneybird administration.

### Basic Operations

#### Get a User

Retrieve a user by their ID.

```php
$user = $client->users()->get('123456789');
```

#### List Users

Get a paginated list of active users in the administration.

```php
$users = $client->users()->paginate();

// Iterate through the pages
foreach ($users as $user) {
    echo $user->name . ' (' . $user->email . ')';
}
```

## User Properties

When working with users, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| name | string | Full name of the user |
| created_at | string | ISO 8601 timestamp of when the user was created |
| updated_at | string | ISO 8601 timestamp of when the user was last updated |
| email | string | Email address of the user |
| email_validated | boolean | Whether the user's email has been validated |
| language | string | Language preference (e.g., "nl", "en") |
| time_zone | string | Time zone setting (e.g., "Europe/Amsterdam") |
| user_type | string | Type of user (e.g., "owner", "employee", "accountant") |
| permissions | array | List of permissions granted to the user |

### User Types

Moneybird supports different types of users:

- **owner**: The owner of the administration with full permissions
- **employee**: Regular employee users with limited permissions
- **accountant**: External accountant with specific access rights

### Permissions

Users can have various permissions, including:

- `sales_invoices`: Access to sales invoices
- `documents`: Access to documents
- `estimates`: Access to estimates
- `bank`: Access to banking features
- `settings`: Access to administration settings
- `ownership`: Administration ownership rights
- `time_entries`: Access to time entries

> **Note:** See the [official API reference](https://developer.moneybird.com/api/users/) for the complete list of available properties and permissions.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/users/) in the Moneybird developer docs
