# Moneybird API Endpoints Backlog

This document tracks the implementation progress of all Moneybird API endpoints in this PHP client.

## Administration
- [x] GET /administrations - Get administrations
- [x] GET /administrations/{id} - Get administration

## Contacts
- [x] GET /contacts - List all contacts (paginate)
- [x] GET /contacts/filter - Filter contacts
- [x] GET /contacts/synchronization - List all ids and versions
- [x] POST /contacts/synchronization - Fetch contacts with given ids
- [x] GET /contacts/{id} - Get contact
- [x] GET /contacts/customer_id/{customer_id} - Get contact by customer id
- [x] POST /contacts - Create a new contact
- [x] PATCH /contacts/{id} - Update a contact
- [x] DELETE /contacts/{id} - Delete a contact
- [x] POST /contacts/{id}/usage_charges - Create an additional charge to be invoiced at start of next period
- [x] GET /contacts/{id}/usage_charges - Get additional charges
- [x] POST /contacts/{id}/notes - Adds note to entity
- [x] DELETE /contacts/{id}/notes/{note_id} - Destroys note from entity
- [x] GET /contacts/{id}/contact_people/{contact_person_id} - Get contact person
- [x] POST /contacts/{id}/contact_people - Create a new contact person
- [x] PATCH /contacts/{id}/contact_people/{contact_person_id} - Update a contact person
- [x] DELETE /contacts/{id}/contact_people/{contact_person_id} - Delete a contact person
- [x] GET /contacts/{id}/mb_payments_mandate - Get Moneybird Payments mandate
- [x] POST /contacts/{id}/mb_payments_mandate - Request a new Moneybird Payments mandate
- [x] POST /contacts/{id}/mb_payments_mandate_url - Request an URL for setting up a Moneybird Payments mandate
- [x] DELETE /contacts/{id}/mb_payments_mandate - Delete a stored Moneybird Payments mandate

## Custom Fields
- [ ] GET /custom_fields - List all custom fields
- [ ] GET /custom_fields/{id} - Get custom field

## Document Styles
- [ ] GET /document_styles - List all document styles
- [ ] GET /document_styles/{id} - Get document style

## Documents: General Documents
- [ ] GET /documents/general_documents - Get general documents
- [ ] GET /documents/general_documents/synchronization - List all ids and versions
- [ ] POST /documents/general_documents/synchronization - Fetch general documents with given ids
- [ ] GET /documents/general_documents/{id} - Get general document
- [ ] POST /documents/general_documents - Create general document
- [ ] PATCH /documents/general_documents/{id} - Update general document
- [ ] DELETE /documents/general_documents/{id} - Delete general document
- [ ] POST /documents/general_documents/{id}/attachments - Create attachment
- [ ] DELETE /documents/general_documents/{id}/attachments/{attachment_id} - Delete attachment

## Documents: General Journal Documents
- [ ] GET /documents/general_journal_documents - Get general journal documents
- [ ] GET /documents/general_journal_documents/synchronization - List all ids and versions
- [ ] POST /documents/general_journal_documents/synchronization - Fetch general journal documents with given ids
- [ ] GET /documents/general_journal_documents/{id} - Get general journal document
- [ ] POST /documents/general_journal_documents - Create general journal document
- [ ] PATCH /documents/general_journal_documents/{id} - Update general journal document
- [ ] DELETE /documents/general_journal_documents/{id} - Delete general journal document
- [ ] POST /documents/general_journal_documents/{id}/attachments - Create attachment
- [ ] DELETE /documents/general_journal_documents/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Purchase Invoices
- [ ] GET /documents/purchase_invoices - Get purchase invoices
- [ ] GET /documents/purchase_invoices/synchronization - List all ids and versions
- [ ] POST /documents/purchase_invoices/synchronization - Fetch purchase invoices with given ids
- [ ] GET /documents/purchase_invoices/{id} - Get purchase invoice
- [ ] POST /documents/purchase_invoices - Create purchase invoice
- [ ] PATCH /documents/purchase_invoices/{id} - Update purchase invoice
- [ ] DELETE /documents/purchase_invoices/{id} - Delete purchase invoice
- [ ] POST /documents/purchase_invoices/{id}/attachments - Create attachment
- [ ] DELETE /documents/purchase_invoices/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Receipts
- [ ] GET /documents/receipts - Get receipts
- [ ] GET /documents/receipts/synchronization - List all ids and versions
- [ ] POST /documents/receipts/synchronization - Fetch receipts with given ids
- [ ] GET /documents/receipts/{id} - Get receipt
- [ ] POST /documents/receipts - Create receipt
- [ ] PATCH /documents/receipts/{id} - Update receipt
- [ ] DELETE /documents/receipts/{id} - Delete receipt
- [ ] POST /documents/receipts/{id}/attachments - Create attachment
- [ ] DELETE /documents/receipts/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Typeless Documents
- [ ] GET /documents/typeless_documents - Get typeless documents
- [ ] GET /documents/typeless_documents/synchronization - List all ids and versions
- [ ] POST /documents/typeless_documents/synchronization - Fetch typeless documents with given ids
- [ ] GET /documents/typeless_documents/{id} - Get typeless document
- [ ] POST /documents/typeless_documents - Create typeless document
- [ ] PATCH /documents/typeless_documents/{id} - Update typeless document
- [ ] DELETE /documents/typeless_documents/{id} - Delete typeless document
- [ ] POST /documents/typeless_documents/{id}/attachments - Create attachment
- [ ] DELETE /documents/typeless_documents/{id}/attachments/{attachment_id} - Delete attachment

## Estimates
- [ ] GET /estimates - Get estimates
- [ ] GET /estimates/synchronization - List all ids and versions
- [ ] POST /estimates/synchronization - Fetch estimates with given ids
- [ ] GET /estimates/{id} - Get estimate
- [ ] POST /estimates - Create estimate
- [ ] PATCH /estimates/{id} - Update estimate
- [ ] DELETE /estimates/{id} - Delete estimate
- [ ] PATCH /estimates/{id}/change_state/{state} - Change estimate state
- [ ] POST /estimates/{id}/send_email - Send estimate by email
- [ ] GET /estimates/{id}/send_email_template - Get send estimate email template
- [ ] POST /estimates/{id}/duplicate - Duplicate estimate

## External Sales Invoices
- [x] GET /external_sales_invoices - List all external sales invoices (paginate)
- [x] GET /external_sales_invoices/synchronization - List all ids and versions
- [x] POST /external_sales_invoices/synchronization - Fetch external sales invoices with given ids
- [x] GET /external_sales_invoices/{id} - Get external sales invoice
- [x] POST /external_sales_invoices - Create external sales invoice
- [x] PATCH /external_sales_invoices/{id} - Update external sales invoice
- [x] DELETE /external_sales_invoices/{id} - Delete external sales invoice
- [x] POST /external_sales_invoices/{id}/payments - Create payment for external sales invoice
- [x] DELETE /external_sales_invoices/{id}/payments/{payment_id} - Delete payment for external sales invoice
- [x] POST /external_sales_invoices/{id}/attachments - Create attachment for external sales invoice

## Financial Accounts
- [ ] GET /financial_accounts - Get financial accounts
- [ ] GET /financial_accounts/{id} - Get financial account

## Financial Mutations
- [ ] GET /financial_mutations - Get financial mutations
- [ ] GET /financial_mutations/synchronization - List all ids and versions
- [ ] POST /financial_mutations/synchronization - Fetch financial mutations with given ids
- [ ] GET /financial_mutations/{id} - Get financial mutation
- [ ] PATCH /financial_mutations/{id} - Update financial mutation
- [ ] POST /financial_mutations/{id}/link_booking - Link booking to financial mutation

## Financial Statements
- [ ] GET /financial_statements - Get financial statements
- [ ] GET /financial_statements/synchronization - List all ids and versions
- [ ] POST /financial_statements/synchronization - Fetch financial statements with given ids
- [ ] GET /financial_statements/{id} - Get financial statement
- [ ] POST /financial_statements - Create financial statement
- [ ] PATCH /financial_statements/{id} - Update financial statement
- [ ] DELETE /financial_statements/{id} - Delete financial statement

## Identities
- [ ] GET /identities - Get identities
- [ ] GET /identities/{id} - Get identity

## Import Mappings
- [ ] GET /import_mappings - Get import mappings
- [ ] GET /import_mappings/{id} - Get import mapping
- [ ] POST /import_mappings - Create import mapping
- [ ] PATCH /import_mappings/{id} - Update import mapping
- [ ] DELETE /import_mappings/{id} - Delete import mapping

## Ledger Accounts
- [ ] GET /ledger_accounts - Get ledger accounts
- [ ] GET /ledger_accounts/{id} - Get ledger account
- [ ] POST /ledger_accounts - Create ledger account
- [ ] PATCH /ledger_accounts/{id} - Update ledger account
- [ ] DELETE /ledger_accounts/{id} - Delete ledger account

## Payments
- [ ] GET /payments - Get payments
- [ ] GET /payments/{id} - Get payment

## Products
- [ ] GET /products - Get products
- [ ] GET /products/synchronization - List all ids and versions
- [ ] POST /products/synchronization - Fetch products with given ids
- [ ] GET /products/{id} - Get product
- [ ] POST /products - Create product
- [ ] PATCH /products/{id} - Update product
- [ ] DELETE /products/{id} - Delete product

## Projects
- [ ] GET /projects - Get projects
- [ ] GET /projects/{id} - Get project
- [ ] POST /projects - Create project
- [ ] PATCH /projects/{id} - Update project
- [ ] DELETE /projects/{id} - Delete project

## Purchase Transactions
- [ ] GET /purchase_transactions - Get purchase transactions
- [ ] GET /purchase_transactions/{id} - Get purchase transaction
- [ ] POST /purchase_transactions - Create purchase transaction
- [ ] PATCH /purchase_transactions/{id} - Update purchase transaction
- [ ] DELETE /purchase_transactions/{id} - Delete purchase transaction

## Recurring Sales Invoices
- [ ] GET /recurring_sales_invoices - Get recurring sales invoices
- [ ] GET /recurring_sales_invoices/synchronization - List all ids and versions
- [ ] POST /recurring_sales_invoices/synchronization - Fetch recurring sales invoices with given ids
- [ ] GET /recurring_sales_invoices/{id} - Get recurring sales invoice
- [ ] POST /recurring_sales_invoices - Create recurring sales invoice
- [ ] PATCH /recurring_sales_invoices/{id} - Update recurring sales invoice
- [ ] DELETE /recurring_sales_invoices/{id} - Delete recurring sales invoice

## Sales Invoices
- [x] GET /sales_invoices - List all sales invoices (paginate)
- [ ] GET /sales_invoices/synchronization - List all ids and versions
- [ ] POST /sales_invoices/synchronization - Fetch sales invoices with given ids
- [x] GET /sales_invoices/{id} - Get sales invoice
- [x] GET /sales_invoices/find_by_invoice_id/{invoice_id} - Find sales invoice by invoice id
- [x] GET /sales_invoices/find_by_reference/{reference} - Find sales invoice by reference
- [x] POST /sales_invoices - Create sales invoice
- [ ] PATCH /sales_invoices/{id} - Update sales invoice
- [ ] DELETE /sales_invoices/{id} - Delete sales invoice
- [x] POST /sales_invoices/{id}/payments - Create payment for sales invoice
- [ ] DELETE /sales_invoices/{id}/payments/{payment_id} - Delete payment for sales invoice
- [ ] POST /sales_invoices/{id}/send_email - Send sales invoice by email
- [ ] GET /sales_invoices/{id}/send_email_template - Get send sales invoice email template
- [ ] POST /sales_invoices/{id}/send_reminder - Send sales invoice reminder by email
- [ ] GET /sales_invoices/{id}/send_reminder_template - Get send sales invoice reminder email template
- [ ] POST /sales_invoices/{id}/send_invoice_reminder - Send invoice reminder by email
- [ ] GET /sales_invoices/{id}/send_invoice_reminder_template - Get send invoice reminder email template
- [ ] POST /sales_invoices/{id}/send_payment_reminder - Send payment reminder by email
- [ ] GET /sales_invoices/{id}/send_payment_reminder_template - Get send payment reminder email template
- [ ] POST /sales_invoices/{id}/send_post - Send sales invoice by post
- [ ] POST /sales_invoices/{id}/mark_as_sent - Mark sales invoice as sent
- [ ] POST /sales_invoices/{id}/mark_as_accepted - Mark sales invoice as accepted
- [ ] POST /sales_invoices/{id}/mark_as_paid - Mark sales invoice as paid
- [ ] POST /sales_invoices/{id}/mark_as_uncollectible - Mark sales invoice as uncollectible
- [ ] POST /sales_invoices/{id}/mark_as_published - Mark sales invoice as published
- [ ] POST /sales_invoices/{id}/mark_as_unpublished - Mark sales invoice as unpublished
- [ ] POST /sales_invoices/{id}/duplicate - Duplicate sales invoice
- [x] POST /sales_invoices/{id}/duplicate_to_credit_invoice - Duplicate sales invoice to credit invoice

## Subscription Templates
- [ ] GET /subscription_templates - Get subscription templates
- [ ] GET /subscription_templates/{id} - Get subscription template
- [ ] POST /subscription_templates - Create subscription template
- [ ] PATCH /subscription_templates/{id} - Update subscription template
- [ ] DELETE /subscription_templates/{id} - Delete subscription template

## Subscriptions
- [ ] GET /subscriptions - Get subscriptions
- [ ] GET /subscriptions/{id} - Get subscription
- [ ] POST /subscriptions - Create subscription
- [ ] PATCH /subscriptions/{id} - Update subscription
- [ ] DELETE /subscriptions/{id} - Delete subscription
- [ ] POST /subscriptions/{id}/pause - Pause subscription
- [ ] POST /subscriptions/{id}/resume - Resume subscription
- [ ] POST /subscriptions/{id}/reactivate - Reactivate subscription
- [ ] POST /subscriptions/{id}/duplicate - Duplicate subscription

## Tax Rates
- [x] GET /tax_rates - List all tax rates (paginate)
- [ ] GET /tax_rates/{id} - Get tax rate
- [ ] POST /tax_rates - Create tax rate

## Time Entries
- [ ] GET /time_entries - Get time entries
- [ ] GET /time_entries/{id} - Get time entry
- [ ] POST /time_entries - Create time entry
- [ ] PATCH /time_entries/{id} - Update time entry
- [ ] DELETE /time_entries/{id} - Delete time entry

## Users
- [ ] GET /users - Get users
- [ ] GET /users/{id} - Get user

## Verifications
- [ ] GET /verifications - Get verifications
- [ ] GET /verifications/{id} - Get verification
- [ ] POST /verifications - Create verification
- [ ] PATCH /verifications/{id} - Update verification
- [ ] DELETE /verifications/{id} - Delete verification

## Webhooks
- [ ] GET /webhooks - Get webhooks
- [ ] GET /webhooks/{id} - Get webhook
- [x] POST /webhooks - Create webhook
- [ ] DELETE /webhooks/{id} - Delete webhook

## Workflows
- [ ] GET /workflows - Get workflows
- [ ] GET /workflows/{id} - Get workflow
- [ ] POST /workflows - Create workflow
- [ ] PATCH /workflows/{id} - Update workflow
- [ ] DELETE /workflows/{id} - Delete workflow
