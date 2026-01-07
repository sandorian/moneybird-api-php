# OpenAPI Spec Comparison Backlog

This document tracks the differences between this PHP library and the official Moneybird OpenAPI specification.

**Last Updated**: 2025-01-07
**OpenAPI Spec Version**: v2-20251223-d1277b6a05
**Spec File**: `openapi-specs/openapi-2025-01-07.yml`

---

## Legend

- ❌ **Not Implemented** - Entire resource missing
- ⚠️ **Partially Implemented** - Some methods/endpoints missing
- ✅ **Implemented** - Fully matches OpenAPI spec

---

## Missing Resources (Not Implemented)

### ❌ Assets
Full asset management including depreciation tracking.

**Endpoints needed:**
- `GET /{administration_id}/assets` - List all assets
- `POST /{administration_id}/assets` - Create an asset
- `GET /{administration_id}/assets/{id}` - Get a single asset
- `PATCH /{administration_id}/assets/{id}` - Update an asset
- `DELETE /{administration_id}/assets/{id}` - Delete an asset
- `POST /{administration_id}/assets/{id}/disposals` - Create a disposal
- `POST /{administration_id}/assets/{id}/sources` - Add a source to an asset
- `DELETE /{administration_id}/assets/{id}/sources/{detail_id}` - Delete a source
- `POST /{administration_id}/assets/{id}/value_changes/arbitrary` - Create arbitrary value change
- `POST /{administration_id}/assets/{id}/value_changes/divestment` - Create divestment value change
- `POST /{administration_id}/assets/{id}/value_changes/full_depreciation` - Create full depreciation
- `POST /{administration_id}/assets/{id}/value_changes/manual` - Create manual value change
- `POST /{administration_id}/assets/{id}/value_changes/retroactive_linear_value_changes` - Create retroactive linear value changes

**Priority**: Medium

---

### ❌ Customer Contact Portal
Allow customers to view their invoices and subscriptions via temporary links.

**Endpoints needed:**
- `POST /{administration_id}/customer_contact_portal/{contact_id}` - Create portal link
- `GET /{administration_id}/customer_contact_portal/{contact_id}/invoices` - List invoices for contact
- `GET /{administration_id}/customer_contact_portal/{contact_id}/subscriptions/{id}` - Get subscription details

**Priority**: Low

---

### ❌ Downloads
Access generated exports from the administration.

**Endpoints needed:**
- `GET /{administration_id}/downloads` - List available downloads
- `GET /{administration_id}/downloads/{id}/download` - Download a file

**Priority**: Low

---

### ❌ Reports
Analytical reports for the administration.

**Endpoints needed:**
- `GET /{administration_id}/reports/assets` - Asset report
- `GET /{administration_id}/reports/balance_sheet` - Balance sheet
- `GET /{administration_id}/reports/cash_flow` - Cash flow report
- `GET /{administration_id}/reports/creditors` - Creditors report
- `GET /{administration_id}/reports/debtors` - Debtors report
- `GET /{administration_id}/reports/expenses_by_contact` - Expenses by contact
- `GET /{administration_id}/reports/expenses_by_project` - Expenses by project
- `GET /{administration_id}/reports/export/auditfile` - Export audit file
- `GET /{administration_id}/reports/export/brugstaat` - Export brugstaat
- `GET /{administration_id}/reports/export/ledger_accounts` - Export ledger accounts
- `GET /{administration_id}/reports/general_ledger` - General ledger
- `GET /{administration_id}/reports/journal_entries` - Journal entries
- `GET /{administration_id}/reports/ledger_accounts/{ledger_account_id}` - Ledger account report
- `GET /{administration_id}/reports/profit_loss` - Profit & loss
- `GET /{administration_id}/reports/revenue_by_contact` - Revenue by contact
- `GET /{administration_id}/reports/revenue_by_project` - Revenue by project
- `GET /{administration_id}/reports/subscriptions` - Subscriptions report
- `GET /{administration_id}/reports/tax` - Tax report

**Priority**: High

---

### ❌ SEPA Credit Transfer
Initiate SEPA credit transfers.

**Endpoints needed:**
- `POST /{administration_id}/sepa_credit_transfer` - Create SEPA credit transfer

**Priority**: Low

---

### ❌ Workflows
Invoice and estimate workflow settings.

**Endpoints needed:**
- `GET /{administration_id}/workflows` - List all workflows

**Priority**: Low

---

## Partially Implemented Resources

### ⚠️ Contacts
**Missing:**
- `POST /{administration_id}/contacts/{id}/archive` - Archive a contact

---

### ⚠️ Estimates
**Missing:**
- `POST /{administration_id}/estimates/{id}/bill_estimate` - Bill an estimate
- `GET /{administration_id}/estimates/find_by_estimate_id/{estimate_id}` - Find by estimate ID
- `GET /{administration_id}/estimates/{id}/download_pdf` - Download PDF
- Attachments sub-resource (CRUD + download)

---

### ⚠️ External Sales Invoices
**Missing:**
- `POST /{administration_id}/external_sales_invoices/{id}/mark_as_dubious` - Mark as dubious
- `POST /{administration_id}/external_sales_invoices/{id}/mark_as_uncollectible` - Mark as uncollectible
- Notes sub-resource

---

### ⚠️ Identities
**Missing:**
- `GET /{administration_id}/identities/default` - Get default identity

---

### ⚠️ Products
**Missing:**
- `GET /{administration_id}/products/identifier/{identifier}` - Find by identifier
- `GET /{administration_id}/products/{id}/sales_link` - Get sales link

---

### ⚠️ Sales Invoices
**Missing:**
- `POST /{administration_id}/sales_invoices/send_reminders` - Bulk send reminders
- `GET /{administration_id}/sales_invoices/{id}/download_packing_slip_pdf` - Download packing slip
- `GET /{administration_id}/sales_invoices/{id}/download_pdf` - Download PDF
- `GET /{administration_id}/sales_invoices/{id}/download_ubl` - Download UBL
- `POST /{administration_id}/sales_invoices/{id}/mark_as_dubious` - Mark as dubious
- `POST /{administration_id}/sales_invoices/{id}/pause` - Pause invoice reminders
- `POST /{administration_id}/sales_invoices/{id}/resume` - Resume invoice reminders
- `POST /{administration_id}/sales_invoices/{id}/register_payment_creditinvoice` - Register payment via credit invoice

---

### ⚠️ Subscription Templates
**Missing:**
- `GET /{administration_id}/subscription_templates/{id}/checkout_identifier` - Get checkout identifier
- `GET /{administration_id}/subscription_templates/{id}/sales_link` - Get sales link

---

### ⚠️ Subscriptions
**Missing:**
- `POST /{administration_id}/subscriptions/{id}/create_and_schedule_one_off_sales_invoice` - Create one-off invoice

---

### ⚠️ Time Entries
**Missing:**
- Notes sub-resource (CRUD)

---

### ⚠️ Financial Mutations
**Missing:**
- `DELETE /{administration_id}/financial_mutations/{id}/unlink_booking` - Unlink booking

---

### ⚠️ Documents (General Documents, General Journal Documents, Purchase Invoices, Receipts)
**Missing on all document types:**
- `GET /{administration_id}/documents/{type}/{id}/attachments/{attachment_id}/download` - Download attachment
- Notes sub-resource with delete by ID

---

### ⚠️ Webhooks
**Missing:**
- `GET /{administration_id}/webhooks` - List all webhooks
- `GET /{administration_id}/webhooks/{id}` - Get a single webhook
- `DELETE /{administration_id}/webhooks/{id}` - Delete a webhook

---

## Fully Implemented Resources

### ✅ Administrations
- List all administrations

### ✅ Custom Fields
- List all custom fields

### ✅ Document Styles
- List all document styles

### ✅ Financial Accounts
- List all financial accounts

### ✅ Financial Statements
- Full CRUD + synchronization

### ✅ Ledger Accounts
- Full CRUD

### ✅ Payments
- Get payment by ID

### ✅ Projects
- Full CRUD

### ✅ Purchase Transactions
- Full CRUD

### ✅ Recurring Sales Invoices
- Full CRUD + synchronization + notes

### ✅ Tax Rates
- List all tax rates

### ✅ Users
- List users, get by ID

### ✅ Verifications
- List verifications

---

## Implementation Priority

### High Priority
1. **Reports** - Essential for financial analysis and compliance
2. **Assets** - Important for businesses with significant fixed assets
3. **Sales Invoices** - Complete missing download and status methods

### Medium Priority
4. **Webhooks** - Complete CRUD operations
5. **Estimates** - Add missing find, bill, and download methods
6. **Financial Mutations** - Add unlink_booking

### Low Priority
7. **Customer Contact Portal** - Nice to have
8. **Downloads** - Export functionality
9. **SEPA Credit Transfer** - Specialized use case
10. **Workflows** - Read-only configuration

---

## Notes

- The OpenAPI spec uses `{format}` suffix on all paths (e.g., `.json`), but this library handles format via headers
- Some endpoints may have additional query parameters not fully documented here
- Check the OpenAPI spec file for complete request/response schemas

---

## Contributing

When implementing missing endpoints:

1. Create request classes in `src/Api/{Resource}/Requests/`
2. Add methods to the endpoint class `src/Api/{Resource}/{Resource}Endpoint.php`
3. Create DTOs if needed in `src/Dto/`
4. Add tests in `tests/`
5. Update this backlog file
