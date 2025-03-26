---
title: Time Entries
description: Interacting with Moneybird's Time Entries API.
---

Manage time entries in Moneybird.

## Working with Time Entries

This section covers how to interact with Moneybird's Time Entries API. You can create, retrieve, update, and delete time entries.

### Basic Operations

#### Get a Time Entry

Retrieve a time entry by its ID.

```php
$timeEntry = $client->timeEntries()->get('123456789');
```

#### List Time Entries

Get a paginated list of time entries.

```php
$timeEntries = $client->timeEntries()->paginate();

// Iterate through the pages
foreach ($timeEntries as $timeEntry) {
    echo $timeEntry->description . ': ' . $timeEntry->started_at . ' to ' . $timeEntry->ended_at;
}
```

#### Create a Time Entry

Create a new time entry.

```php
$data = [
    'contact_id' => '123456789', // Optional
    'project_id' => '987654321', // Optional
    'started_at' => '2023-01-01T09:00:00.000Z',
    'ended_at' => '2023-01-01T10:30:00.000Z',
    'description' => 'Client meeting',
    'billable' => true,
    'paused_duration' => 0
];

$timeEntry = $client->timeEntries()->create($data);
```

#### Update a Time Entry

Update an existing time entry.

```php
$updateData = [
    'description' => 'Updated client meeting',
    'billable' => false
];

$timeEntry = $client->timeEntries()->update('123456789', $updateData);
```

#### Delete a Time Entry

Delete a time entry.

```php
$client->timeEntries()->delete('123456789');
```

### Filtering Time Entries

You can filter time entries by adding query parameters to the request. For example, to filter by period:

```php
$request = new GetTimeEntriesPageRequest;
$request->query()->add('filter', 'period:this_month');
$timeEntries = $client->paginate($request);
```

Common filters include:
- `period:{this_week|this_month|this_quarter|this_year}` - Filter by time period
- `contact_id:{id}` - Filter by contact ID
- `project_id:{id}` - Filter by project ID
- `user_id:{id}` - Filter by user ID
- `state:{active|archived}` - Filter by state

## Time Entry Properties

When working with time entries, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | string | ID of the administration the time entry belongs to |
| contact_id | string | ID of the contact associated with the time entry (optional) |
| project_id | string | ID of the project associated with the time entry (optional) |
| user_id | int | ID of the user who created the time entry |
| started_at | string | ISO 8601 timestamp of when the time entry started |
| ended_at | string | ISO 8601 timestamp of when the time entry ended |
| description | string | Description of the time entry |
| paused_duration | int | Duration of pauses in seconds |
| billable | boolean | Whether the time entry is billable |
| created_at | string | ISO 8601 timestamp of when the time entry was created |
| updated_at | string | ISO 8601 timestamp of when the time entry was last updated |
| contact | array | Contact information (if a contact is associated) |
| detail | array | Additional details (if any) |
| user | array | User information |
| project | array | Project information (if a project is associated) |
| events | array | Events related to the time entry |
| notes | array | Notes associated with the time entry |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/time_entries/) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/time_entries/) in the Moneybird developer docs
