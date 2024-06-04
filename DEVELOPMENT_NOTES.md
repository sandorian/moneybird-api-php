# Moneybird API SDK based on Saloon PHP

## Vatly overall approach on Moneybird

1. Dealing with Moneybird API rate limits: 150 calls per 5 minutes.
    - Vatly queues all Moneybird calls on a dedicated table. With approx 5 calls per Order this translates to storing up to 30 Orders per 5 minutes, or 8.640 Orders per day.
    - The rate limiter is IP based, so if necessary we can use a proxy to increase the limits. Suggested by Moneybird support.
    - Moneybird has a fair usage policy. If our usage is deemed unfair, we can billed for it - which is reasonable and our best option currently.

## Vatly approach on Order registrations in Moneybird

1. Dealing with tax rates:
    - [ ] When registering Orders with Moneybird, we need to provide the appropriate Moneybird Tax Rate ID on each Order Item.
    - [ ] As we cannot create tax rates through the Moneybird API, we need to manage these manually in the Moneybird dashboard.
        - [ ] Tax rates should be enabled in the Moneybird dashboard for each enabled legislation in Vatly.
            - Only accessible through hidden url https://moneybird.com/387647559369229893/tax_rates/new?advanced=true (notice the suffix `/new?advanced=true`)
            - If there are too many tax rates to enter manually, we could either hire a cheap VA or script it i.e. with Laravel Dusk.
    - [ ] We can fetch these tax rates though, so we keep these all locally in the database and periodically refresh the table.
        - [x] `Services\Moneybird\Actions\RefreshStoredMoneybirdTaxRates`
        - [x] `moneyird_tax_rates` table and `MoneyBirdTaxRate` model
        - [ ] Queueable job, schedule (weekly) & artisan command
        - [ ] Tests
    - [ ] If a tax rate is missing, we keep the api call on the queue and do not send it.
        - [ ] Instead, we notify the admin and proceed with the other calls.
        - [ ] It's ok for the calls to sit there waiting for a week or so.
    - [ ] Mapping tax rates:
        - [ ] A recognizable identifier is used for storing each tax rate. I.e. `CONSUMER_NL_B2C_21` for a B2C tax rate to a NL consumer at 21%. Similarly, we'd use `MERCHANT_NL_21` for a NL merchant at 21%.
            - [ ] TODO: check this with the Vatly accountant, given our use cases.
            - [ ] TODO: (pending) check this with Moneybird support, given our use cases.
        - [ ] Ideally we reuse the same `TaxRateIdentifier` across the system for easy mapping.

## Vatly approach on Expense registrations in Moneybird

1. Register and implement a Moneybird webhook that listens for expense related events.
2. Handle these events in Vatly, by creating expense records over at Quaderno. This way Quaderno can yield the reports including the expenses we made in the legislation.
    - Do not forward calls on registrations that are not enabled in Quaderno. Instead, put these in a separate table and notify the administrator.

## Backlog

### Administrations

| Status | Vatly requirement | Method | Endpoint                  | Description              |
|--------|-------------------|--------|---------------------------|--------------------------|
|        |                   | GET    | /:version/administrations | List all administrations |

### Contacts
| Status      | Vatly requirement | Method | Endpoint                                         | Description                                            |
|-------------|-------------------|--------|--------------------------------------------------|--------------------------------------------------------|
|             |                   | GET    | /contacts                                        | List all contacts                                      |
|             |                   | GET    | /contacts/filter                                 | Filter contacts                                        |
|             |                   | GET    | /contacts/synchronization                        | List all ids and versions                              |
|             |                   | POST   | /contacts/synchronization                        | Fetch contacts with given ids                          |
|             |                   | GET    | /contacts/:id                                    | Get contact                                            |
|             |                   | GET    | /contacts/customer_id/:customer_id               | Get contact by customer id                             |
| Needs tests | Yes               | POST   | /contacts                                        | Create a new contact                                   |
|             |                   | PATCH  | /contacts/:id                                    | Update a contact                                       |
|             |                   | DELETE | /contacts/:id                                    | Delete a contact                                       |
|             |                   | POST   | /contacts/:id/additional_charges                 | Create an additional charge to be invoiced next period |
|             |                   | GET    | /contacts/:id/additional_charges                 | Get additional charges                                 |
|             |                   | POST   | /contacts/:contact_id/notes                      | Add note to entity                                     |
|             |                   | DELETE | /contacts/:contact_id/notes/:id                  | Destroy note from entity                               |
|             |                   | GET    | /contacts/:contact_id/contact_people/:id         | Get contact person                                     |
|             |                   | POST   | /contacts/:contact_id/contact_people             | Create a new contact person                            |
|             |                   | PATCH  | /contacts/:contact_id/contact_people/:id         | Update a contact person                                |
|             |                   | DELETE | /contacts/:contact_id/contact_people/:id         | Delete a contact person                                |
|             |                   | GET    | /contacts/:contact_id/moneybird_payments_mandate | Get Moneybird Payments mandate                         |
|             |                   | POST   | /contacts/:contact_id/moneybird_payments_mandate | Request a new Moneybird Payments mandate               |
|             |                   | DELETE | /contacts/:contact_id/moneybird_payments_mandate | Delete a stored Moneybird Payments mandate             |

### Custom fields

| Status | Vatly requirement | Method | Endpoint       | Description            |
|--------|-------------------|--------|----------------|------------------------|
|        |                   | GET    | /custom_fields | List all custom fields |

### Documents, document styles, estimates

Status: none, no Vatly requirement.

### External sales invoices

| Status      | Vatly requirement | Method | Endpoint                                                                     | Description                                   |
|-------------|-------------------|--------|------------------------------------------------------------------------------|-----------------------------------------------|
| Needs tests | No                | GET    | /external_sales_invoices                                                     | List all external invoices                    |
|             |                   | GET    | /external_sales_invoices/:id                                                 | Get an external sales invoice by id           |
| Needs tests | Yes               | POST   | /external_sales_invoices                                                     | Create an external sales invoice              |
|             |                   | POST   | /external_sales_invoices/attachment                                          | Create external sales invoice from attachment |
| Needs tests | Yes ️             | POST   | /external_sales_invoices/:id/attachment                                      | Add attachment to external sales invoice      |
|             |                   | PATCH  | /external_sales_invoices/:id                                                 | Update an external sales invoice              |
|             |                   | DELETE | /external_sales_invoices/:id                                                 | Delete an external sales invoice              |
|             |                   | PATCH  | /external_sales_invoices/:id/mark_as_dubious                                 | Mark as dubious                               |
|             |                   | PATCH  | /external_sales_invoices/:id/mark_as_uncollectible                           | Mark as uncollectible                         |
|             |                   | POST   | /external_sales_invoices/:external_sales_invoice_id/notes                    | Adds note to entity                           |
|             |                   | DELETE | /external_sales_invoices/:external_sales_invoice_id/notes/:id                | Destroys note from entity                     |
|             |                   | POST   | /external_sales_invoices/:external_sales_invoice_id/payments                 | Create a payment                              |
|             |                   | DELETE | /external_sales_invoices/:external_sales_invoice_id/payments/:id             | Delete a payment                              |
|             |                   | GET    | /external_sales_invoices/:external_sales_invoice_id/attachments/:id/download | Download attachment                           |
|             | ️                 | DELETE | /external_sales_invoices/:external_sales_invoice_id/attachments/:id          | Delete an attachment                          |

### Financial accounts, financial mutations, financial statements, identities

Status: none, no Vatly requirement.

### Import mappings

Status: none, no Vatly requirement.

### Ledger accounts, Payments, Products, Projects, Purchase transactions, Recurring sales invoices

Status: none, no Vatly requirement.

### Subscription templates, Subscriptions

Status: none, no Vatly requirement.

### Tax rates

| Status      | Vatly requirement | Method | Endpoint   | Description                                         |
|-------------|-------------------|--------|------------|-----------------------------------------------------|
| Needs tests | Yes               | GET    | /tax_rates | List all available tax rates for the administration |

### Time entries, Users, Verifications

Status: none, no Vatly requirement.

### Webhooks

| Status | Vatly requirement | Method | Endpoint  | Description       |
|--------|-------------------|--------|-----------|-------------------|
|        |                   | GET    | /webhooks | List all webhooks |
|        |                   | POST   | /webhooks | Create a webhook  |
|        |                   | DELETE | /webhooks | Delete a webhook  |

### Workflows

Status: none, no Vatly requirement.

## Usage

```php
use Service\Moneybird\Api\MoneybirdApiClient;

// 1. Authentication
$moneybird = new Moneybird('your_key_here', 'your_administration_id_here');

// 2. Making api requests
$contact = $moneybird->contacts()->create([
    'company_name' => 'Sandorian Consultancy B.V.',
    'contact_country' => 'NL',
]);
```
