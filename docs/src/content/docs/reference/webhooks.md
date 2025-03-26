---
title: Webhooks
description: Interacting with Moneybird's Webhooks API.
---

Manage webhooks in Moneybird.

## Working with Webhooks

This section covers how to interact with Moneybird's Webhooks API. Webhooks allow you to receive notifications when certain events occur in Moneybird, such as when a contact is created or an invoice state changes.

### Basic Operations

#### Create a Webhook

Create a new webhook to receive notifications for events in Moneybird.

```php
$data = [
    'url' => 'https://example.com/webhook-endpoint',
    'enabled_events' => ['contact_created', 'sales_invoice_created'] // Optional
];

$webhook = $client->webhooks()->create($data);
```

## Webhook Properties

When working with webhooks, you'll have access to the following properties:

| Property | Type | Description |
|----------|------|-------------|
| id | string | Unique identifier for the webhook |
| administration_id | string | ID of the administration the webhook belongs to |
| url | string | URL that will receive the webhook notifications |
| enabled_events | array | List of events the webhook is subscribed to |
| last_http_status | int | Last HTTP status code received when delivering the webhook |
| last_http_body | string | Last HTTP response body received when delivering the webhook |
| token | string | Security token used to verify webhook authenticity |

### Webhook Events

Webhooks can be configured to trigger on specific events. Some of the available events include:

- `contact_created`
- `contact_updated`
- `contact_destroyed`
- `sales_invoice_created`
- `sales_invoice_updated`
- `sales_invoice_destroyed`
- `sales_invoice_state_changed_to_draft`
- `sales_invoice_state_changed_to_open`
- `sales_invoice_state_changed_to_scheduled`
- `sales_invoice_state_changed_to_pending_payment`
- `sales_invoice_state_changed_to_late`
- `sales_invoice_state_changed_to_paid`
- `sales_invoice_state_changed_to_uncollectible`
- `sales_invoice_state_changed_to_reminded`
- `sales_invoice_state_changed_to_payment_processing`

### Webhook Payload

When an event occurs, Moneybird will send a POST request to the configured URL with a JSON payload containing:

```json
{
  "administration_id": "123456789",
  "webhook_id": "987654321",
  "webhook_token": "abcdef123456",
  "entity_type": "SalesInvoice",
  "entity_id": "123456",
  "state": "open",
  "action": "sales_invoice_state_changed_to_open",
  "entity": {
    // Full entity data
  }
}
```

### Idempotency

Webhook requests include an `Idempotency-Key` header with a unique value for each webhook push. This can be used to ensure your application never processes the same webhook twice, especially since Moneybird will retry failed webhook deliveries.

## Further reading

- Read [the full API reference](https://developer.moneybird.com/api/webhooks/) in the Moneybird developer docs
- Learn more about [webhooks](https://developer.moneybird.com/webhooks/) in the Moneybird developer docs
