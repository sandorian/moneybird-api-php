---
title: Projects
description: Interacting with Moneybird's Projects API.
---

Manage your Projects in Moneybird.

## Working with Projects

This section covers how to interact with Moneybird's Projects API. You can create, retrieve, update, and delete projects.

### Basic Operations

#### Get a Project

Retrieve a project by its ID.

```php
$project = $client->projects()->get('123456789');
```

#### List Projects

Get a paginated list of projects.

```php
$projects = $client->projects()->paginate();

// Iterate through the pages
foreach ($projects as $project) {
    echo $project->name;
}
```

#### Get All Projects

Get all projects at once.

```php
$allProjects = $client->projects()->all();

// Iterate through all projects
foreach ($allProjects as $project) {
    echo $project->name;
}
```

#### Create a Project

Create a new project.

```php
$data = [
    'name' => 'Website Redesign',
    'state' => 'active'
];

$project = $client->projects()->create($data);
```

#### Update a Project

Update an existing project.

```php
$updateData = [
    'name' => 'Website Redesign 2.0',
    'state' => 'archived'
];

$project = $client->projects()->update('123456789', $updateData);
```

#### Delete a Project

Delete a project.

```php
$client->projects()->delete('123456789');
```

## Project Properties

When working with projects, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the project belongs to |
| name | string | Name of the project |
| state | string | Current state of the project (e.g., 'active', 'archived') |
| created_at | string | ISO 8601 timestamp of when the project was created |
| updated_at | string | ISO 8601 timestamp of when the project was last updated |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/projects/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/projects/) in the Moneybird developer docs
