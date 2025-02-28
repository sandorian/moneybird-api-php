---
title: Contacts
description: Interacting with Moneybird's Contacts API.
---

Manage your contacts in Moneybird.

## Working with Contacts

This section covers how to interact with Moneybird's Contacts API. You can create, retrieve, update, and delete contacts, as well as manage contact people, notes, usage charges, and payment mandates.

### Basic Operations

#### Get a Contact

Retrieve a contact by its ID.

```php
$contact = $client->contacts()->get('contact-id-123');
```

#### Get a Contact by Customer ID

Retrieve a contact using its customer ID.

```php
$contact = $client->contacts()->getByCustomerId('customer-123');
```

#### Filter Contacts

Filter contacts based on specific criteria.

```php
$filters = [
    'query' => 'Company Name',
    'customer_id' => '12345',
];

$contacts = $client->contacts()->filter($filters);
```

#### Create a Contact

Create a new contact.

```php
$contactData = [
    'company_name' => 'ACME Corporation',
    'firstname' => 'John',
    'lastname' => 'Doe',
    'address1' => '123 Main Street',
    'city' => 'Amsterdam',
    'country' => 'NL',
    'email' => 'john@example.com',
];

$contact = $client->contacts()->create($contactData);
```

#### Update a Contact

Update an existing contact.

```php
$updateData = [
    'email' => 'updated@example.com',
    'phone' => '+31612345678',
];

$contact = $client->contacts()->update('contact-id-123', $updateData);
```

#### Delete a Contact

Delete a contact.

```php
$client->contacts()->delete('contact-id-123');
```

#### Paginate Contacts

Get a paginated list of contacts.

```php
$contacts = $client->contacts()->paginate();

// Iterate through the pages
foreach ($contacts as $contact) {
    echo $contact->company_name;
}
```

### Synchronization

#### Get Synchronization

Get synchronization information for contacts.

```php
$synchronization = $client->contacts()->getSynchronization();
```

#### Synchronize Contacts

Synchronize contacts with the provided IDs.

```php
$ids = ['contact-id-1', 'contact-id-2'];
$result = $client->contacts()->synchronize($ids);
```

### Contact People

#### Get a Contact Person

Retrieve a specific contact person.

```php
$contactPerson = $client->contacts()->getContactPerson('contact-id-123', 'person-id-456');
```

#### Create a Contact Person

Create a new contact person for a contact.

```php
$personData = [
    'firstname' => 'Jane',
    'lastname' => 'Smith',
    'email' => 'jane@example.com',
    'phone' => '+31612345678',
    'department' => 'Sales',
];

$contactPerson = $client->contacts()->createContactPerson('contact-id-123', $personData);
```

#### Update a Contact Person

Update an existing contact person.

```php
$updateData = [
    'email' => 'updated@example.com',
];

$contactPerson = $client->contacts()->updateContactPerson('contact-id-123', 'person-id-456', $updateData);
```

#### Delete a Contact Person

Delete a contact person.

```php
$client->contacts()->deleteContactPerson('contact-id-123', 'person-id-456');
```

### Notes

#### Create a Note

Add a note to a contact.

```php
$noteData = [
    'note' => 'Called about invoice #123',
    'todo' => true,
];

$note = $client->contacts()->createNote('contact-id-123', $noteData);
```

#### Delete a Note

Delete a note from a contact.

```php
$client->contacts()->deleteNote('contact-id-123', 'note-id-789');
```

### Usage Charges

#### Create a Usage Charge

Create a usage charge for a contact.

```php
$chargeData = [
    'description' => 'Additional services',
    'price' => 100.00,
    'period' => '2023-01',
];

$usageCharge = $client->contacts()->createUsageCharge('contact-id-123', $chargeData);
```

#### Get Usage Charges

Get all usage charges for a contact.

```php
$usageCharges = $client->contacts()->getUsageCharges('contact-id-123');
```

### Moneybird Payments Mandate

#### Get Payments Mandate

Get the Moneybird payments mandate for a contact.

```php
$mandate = $client->contacts()->getMbPaymentsMandate('contact-id-123');
```

#### Create Payments Mandate

Create a Moneybird payments mandate for a contact.

```php
$mandate = $client->contacts()->createMbPaymentsMandate('contact-id-123');
```

#### Create Payments Mandate URL

Create a URL for setting up a Moneybird payments mandate.

```php
$mandateUrl = $client->contacts()->createMbPaymentsMandateUrl('contact-id-123');
```

#### Delete Payments Mandate

Delete a Moneybird payments mandate.

```php
$client->contacts()->deleteMbPaymentsMandate('contact-id-123');
```

## Contact Properties

When working with contacts, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier |
| administration_id | integer | Administration ID |
| company_name | string | Company name |
| firstname | string | First name |
| lastname | string | Last name |
| address1 | string | Address line 1 |
| address2 | string | Address line 2 |
| zipcode | string | Postal code |
| city | string | City |
| country | string | Country code |
| phone | string | Phone number |
| delivery_method | string | Delivery method |
| customer_id | string | Customer ID |
| tax_number | string | Tax number |
| chamber_of_commerce | string | Chamber of commerce number |
| bank_account | string | Bank account |
| attention | string | Attention |
| email | string | Email address |
| email_ubl | boolean | Send UBL with email |
| sepa_active | boolean | SEPA active |
| sepa_iban | string | SEPA IBAN |
| sepa_iban_account_name | string | SEPA IBAN account name |
| sepa_bic | string | SEPA BIC |
| sepa_mandate_id | string | SEPA mandate ID |
| sepa_mandate_date | string | SEPA mandate date |
| moneybird_payments_mandate | boolean | Moneybird payments mandate active |
| created_at | string | Creation timestamp |
| updated_at | string | Last update timestamp |
| version | integer | Version number |
| notes | array | Contact notes |
| custom_fields | array | Custom fields |
| contact_people | array | Contact people |
| archived | boolean | Whether the contact is archived |

> **Note:** See the [official API reference](https://developer.moneybird.com/api/contacts/#contacts-object) for the complete list of available properties.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/contacts/) in the Moneybird developer docs
