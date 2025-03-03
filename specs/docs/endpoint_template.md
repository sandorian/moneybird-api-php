---
title: [ENDPOINT_NAME]
description: Interacting with Moneybird's [ENDPOINT_NAME] API.
---

Manage your [ENDPOINT_NAME] in Moneybird.

## Working with [ENDPOINT_NAME]

This section covers how to interact with Moneybird's [ENDPOINT_NAME] API. You can create, retrieve, update, and delete [ENDPOINT_NAME], as well as [MENTION_ANY_SPECIALIZED_FEATURES].

### Basic Operations

#### Get a [SINGULAR_ENDPOINT_NAME]

Retrieve a [SINGULAR_ENDPOINT_NAME] by its ID.

```php
$[SINGULAR_ENDPOINT_NAME_LOWERCASE] = $client->[ENDPOINT_NAME_LOWERCASE]()->get('[EXAMPLE_ID]');
```

#### List [ENDPOINT_NAME]

Get a paginated list of [ENDPOINT_NAME].

```php
$[ENDPOINT_NAME_LOWERCASE] = $client->[ENDPOINT_NAME_LOWERCASE]()->paginate();

// Iterate through the pages
foreach ($[ENDPOINT_NAME_LOWERCASE] as $[SINGULAR_ENDPOINT_NAME_LOWERCASE]) {
    echo $[SINGULAR_ENDPOINT_NAME_LOWERCASE]->[MAIN_PROPERTY];
}
```

#### Create a [SINGULAR_ENDPOINT_NAME]

Create a new [SINGULAR_ENDPOINT_NAME].

```php
$data = [
    // Include example properties with realistic values
    '[PROPERTY1]' => '[VALUE1]',
    '[PROPERTY2]' => '[VALUE2]',
];

$[SINGULAR_ENDPOINT_NAME_LOWERCASE] = $client->[ENDPOINT_NAME_LOWERCASE]()->create($data);
```

#### Update a [SINGULAR_ENDPOINT_NAME]

Update an existing [SINGULAR_ENDPOINT_NAME].

```php
$updateData = [
    '[PROPERTY1]' => '[UPDATED_VALUE1]',
];

$[SINGULAR_ENDPOINT_NAME_LOWERCASE] = $client->[ENDPOINT_NAME_LOWERCASE]()->update('[EXAMPLE_ID]', $updateData);
```

#### Delete a [SINGULAR_ENDPOINT_NAME]

Delete a [SINGULAR_ENDPOINT_NAME].

```php
$client->[ENDPOINT_NAME_LOWERCASE]()->delete('[EXAMPLE_ID]');
```

### [SPECIALIZED_FEATURE_1]

[DESCRIBE_SPECIALIZED_FEATURE_1]

#### [SPECIALIZED_METHOD_1]

```php
[EXAMPLE_CODE_FOR_SPECIALIZED_METHOD_1]
```

### [SPECIALIZED_FEATURE_2]

[DESCRIBE_SPECIALIZED_FEATURE_2]

#### [SPECIALIZED_METHOD_2]

```php
[EXAMPLE_CODE_FOR_SPECIALIZED_METHOD_2]
```

## [SINGULAR_ENDPOINT_NAME] Properties

When working with [ENDPOINT_NAME_LOWERCASE], you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| [PROPERTY1] | [TYPE1] | [DESCRIPTION1] |
| [PROPERTY2] | [TYPE2] | [DESCRIPTION2] |
| [PROPERTY3] | [TYPE3] | [DESCRIPTION3] |
| [CONTINUE_WITH_ALL_RELEVANT_PROPERTIES] | | |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/[ENDPOINT_NAME_LOWERCASE]/#[ENDPOINT_NAME_LOWERCASE]-object) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/[ENDPOINT_NAME_LOWERCASE]/) in the Moneybird developer docs

<!-- 
Style guidelines:
1. Focus on functionality rather than implementation details
2. Use practical examples with realistic values
3. Don't mention class names or implementation details
4. Format all code examples in PHP
5. Include a properties table with types and descriptions
6. Keep explanations concise and user-focused
7. Group related operations into logical sections
8. Include any specialized methods specific to this endpoint
9. Use consistent formatting and terminology throughout
-->
