# OpenAPI Spec Comparison Backlog

This document tracks the differences between this PHP library and the official Moneybird OpenAPI specification.

**Last Updated**: 2026-07-12
**OpenAPI Spec Version**: v2-20260710-57729b61b9
**Spec File**: `openapi-specs/openapi-2026-07-12.yml`

---

## 🆕 Spec Changes Since 2025-01-07 (v2-20251223 → v2-20260710)

New in the official spec, compared to the previous stored version:

- **Task Lists** (entirely new resource family, not implemented): `task_lists`, `task_list_groups`, `task_list_tasks` (incl. assignment, completion, notes), `task_list_templates`
- **External Sales Invoices synchronization** (`GET`/`POST /external_sales_invoices/synchronization`) is now officially in the spec — this library already implemented it (`getSynchronization()` / `synchronize()`), so it is no longer "undocumented"
- **Reports**: new `GET /reports/creditors_aging` and `GET /reports/debtors_aging`
- **Assets**: new `POST`/`DELETE /assets/{id}/reinvestment_reserve_purchase` and `.../reinvestment_reserve_sale`; the sources delete path parameter was renamed `detail_id` → `source_id`
- **Time Entries**: new `PATCH /time_entries/{id}/resume` and `PATCH /time_entries/{id}/stop` (not implemented)
- **Webhooks**: new `PATCH /webhooks/{id}/activate` and `PATCH /webhooks/{id}/deactivate` (not implemented)
- **Workflows**: new `GET /workflows/{id}` (resource still not implemented)

---

## Legend

- 🐛 **Incorrect Implementation** - Bug that needs fixing
- ❓ **Not in Spec** - Implemented but not in OpenAPI spec (may be undocumented/legacy)
- ❌ **Not Implemented** - Entire resource missing from library
- ⚠️ **Partially Implemented** - Some methods/endpoints missing
- ✅ **Fully Implemented** - Matches OpenAPI spec

---

## ✅ Fixed Bugs (Previously Incorrect)

The following bugs have been fixed:

| Request | Fix Applied |
|---------|-------------|
| `SendSalesInvoiceEmailRequest` | POST→PATCH, endpoint `send_email`→`send_invoice` |
| `SendEstimateEmailRequest` | POST→PATCH, endpoint `send_email`→`send_estimate` |
| `DuplicateSalesInvoiceToCreditInvoiceRequest` | POST→PATCH |
| `MarkSalesInvoiceAsUncollectibleRequest` | POST→PATCH |
| `ChangeEstimateStateRequest` | State moved from URL path to request body |

---

## ❓ Endpoints/Methods Not in OpenAPI Spec

These are implemented but **do not appear in the official OpenAPI spec**. They may be undocumented legacy endpoints that work, or they may not work at all. **Needs verification against the live API.**

### Sales Invoices - Status Change Endpoints

| File | Endpoint | Status |
|------|----------|--------|
| `MarkSalesInvoiceAsSentRequest.php` | `mark_as_sent` | ❓ Not in spec |
| `MarkSalesInvoiceAsPaidRequest.php` | `mark_as_paid` | ❓ Not in spec |
| `MarkSalesInvoiceAsAcceptedRequest.php` | `mark_as_accepted` | ❓ Not in spec |
| `MarkSalesInvoiceAsPublishedRequest.php` | `mark_as_published` | ❓ Not in spec |
| `MarkSalesInvoiceAsUnpublishedRequest.php` | `mark_as_unpublished` | ❓ Not in spec |

**Note:** The spec only documents `mark_as_dubious` and `mark_as_uncollectible`.

---

### Synchronization Endpoints Not in Spec

These resources have synchronization methods implemented, but the OpenAPI spec does NOT include sync endpoints for them:

| Resource | Methods in Codebase | In Spec? |
|----------|---------------------|----------|
| Products | `synchronization()`, `synchronize()` | ❌ No |
| Financial Statements | `synchronization()`, `synchronize()` | ❌ No |

**Update 2026-07-12:** External Sales Invoices synchronization was added to the official spec and is no longer in this list — the existing `getSynchronization()` / `synchronize()` implementation is now spec-compliant.

---

### Financial Statements - Extra Methods

The OpenAPI spec only supports:
- `POST /financial_statements` (create)
- `PATCH /financial_statements/{id}` (update)
- `DELETE /financial_statements/{id}` (delete)

But the codebase also has:
- `paginate()`, `all()` - **Not in spec** (no GET list endpoint)
- `get()` - **Not in spec** (no GET by ID endpoint)
- `synchronization()`, `synchronize()` - **Not in spec**

---

### Ledger Accounts - Create Method

The OpenAPI spec does NOT have a POST endpoint for creating ledger accounts, but `LedgerAccountsEndpoint::create()` exists.

---

### Import Mappings - Entire Resource

`ImportMappingsEndpoint` exists but the entire `/import_mappings` resource is **not in the OpenAPI spec**.

---

## ❌ Missing Resources (Not Implemented)

### Assets
Full asset management including depreciation tracking.

**Endpoints needed:**
- `GET/POST /{administration_id}/assets` - List/Create
- `GET/PATCH/DELETE /{administration_id}/assets/{id}` - CRUD
- `POST /{administration_id}/assets/{id}/disposals` - Create disposal
- `POST/DELETE /{administration_id}/assets/{id}/sources` - Manage sources (delete uses `source_id`)
- `POST/DELETE /{administration_id}/assets/{id}/reinvestment_reserve_purchase` - *(new in v2-20260710)*
- `POST/DELETE /{administration_id}/assets/{id}/reinvestment_reserve_sale` - *(new in v2-20260710)*
- `POST /{administration_id}/assets/{id}/value_changes/*` - Value changes (arbitrary, divestment, full_depreciation, manual, retroactive)

---

### Reports
Analytical reports for the administration.

**Endpoints needed:**
- Balance sheet, Cash flow, Profit & loss
- Creditors, Debtors
- Creditors aging, Debtors aging *(new in v2-20260710)*
- Revenue/Expenses by contact/project
- General ledger, Journal entries
- Tax report, Subscriptions report, Assets report
- Export endpoints (auditfile, brugstaat, ledger_accounts)

---

### Customer Contact Portal
- `POST /{administration_id}/customer_contact_portal/{contact_id}` - Create portal link
- `GET .../invoices` - List invoices
- `GET .../subscriptions/{id}` - Get subscription

---

### Downloads
- `GET /{administration_id}/downloads` - List downloads
- `GET /{administration_id}/downloads/{id}/download` - Download file

---

### SEPA Credit Transfer
- `POST /{administration_id}/sepa_credit_transfer`

---

### Workflows
- `GET /{administration_id}/workflows` - List workflows
- `GET /{administration_id}/workflows/{id}` - Get single workflow *(new in v2-20260710)*

---

### Task Lists *(new in v2-20260710)*
Task management resource family, entirely new in the spec:

- `GET/POST /{administration_id}/task_lists` + `GET/PATCH/DELETE /task_lists/{id}`
- `POST /task_lists/{task_list_id}/groups`
- `GET/PATCH/DELETE /task_list_groups/{id}` + `POST /task_list_groups/{task_list_group_id}/tasks`
- `GET/PATCH/DELETE /task_list_tasks/{id}`
- `POST/DELETE /task_list_tasks/{task_list_task_id}/assignment`
- `POST/DELETE /task_list_tasks/{task_list_task_id}/completion`
- `POST /task_list_tasks/{task_list_task_id}/notes`
- `GET/POST /task_list_templates` + `GET/PATCH/DELETE /task_list_templates/{id}`
- `POST /task_list_templates/{task_list_template_id}/groups`
- `POST /task_list_templates/{task_list_template_id}/task_lists`

---

## ⚠️ Partially Implemented Resources

### Contacts
**Missing:** `POST .../archive` - Archive a contact

---

### Estimates
**Missing:**
- `PATCH /{id}/bill_estimate` - Bill an estimate
- `GET /find_by_estimate_id/{estimate_id}` - Find by ID
- `GET /{id}/download_pdf` - Download PDF
- Attachments sub-resource (CRUD + download)

---

### External Sales Invoices
**Missing:**
- `PATCH /{id}/mark_as_dubious` - Mark as dubious
- `PATCH /{id}/mark_as_uncollectible` - Mark as uncollectible
- Notes sub-resource

**Note:** Synchronization endpoints were added to the spec in v2-20260710; the existing implementation is now spec-compliant.

---

### Identities
**Missing:** `GET /default` - Get default identity

---

### Products
**Missing:**
- `GET /identifier/{identifier}` - Find by identifier
- `GET /{id}/sales_link` - Get sales link

**Note:** Synchronization methods exist but are NOT in spec.

---

### Sales Invoices
**Missing:**
- `POST /send_reminders` - Bulk send reminders
- `GET /{id}/download_pdf` - Download PDF
- `GET /{id}/download_packing_slip_pdf` - Download packing slip
- `GET /{id}/download_ubl` - Download UBL
- `PATCH /{id}/mark_as_dubious` - Mark as dubious
- `POST /{id}/pause` - Pause reminders
- `POST /{id}/resume` - Resume reminders
- `PATCH /{id}/register_payment_creditinvoice` - Register via credit invoice

---

### Subscription Templates
**Missing:**
- `GET /{id}/checkout_identifier`
- `GET /{id}/sales_link`

---

### Subscriptions
**Missing:** `POST /{id}/create_and_schedule_one_off_sales_invoice`

---

### Time Entries
**Missing:**
- Notes sub-resource (CRUD)
- `PATCH /{id}/resume` - Resume a running time entry *(new in v2-20260710)*
- `PATCH /{id}/stop` - Stop a running time entry *(new in v2-20260710)*

---

### Financial Mutations
**Missing:** `DELETE /{id}/unlink_booking`

---

### Documents (All Types)
**Missing on General Documents, General Journal Documents, Purchase Invoices, Receipts:**
- `GET .../attachments/{id}/download` - Download attachment

---

### Webhooks
**Missing:**
- `GET /webhooks` - List all webhooks
- `GET /webhooks/{id}` - Get single webhook
- `DELETE /webhooks/{id}` - Delete webhook
- `PATCH /webhooks/{id}/activate` - Activate webhook *(new in v2-20260710)*
- `PATCH /webhooks/{id}/deactivate` - Deactivate webhook *(new in v2-20260710)*

---

## ✅ Fully Implemented Resources

These match the OpenAPI spec:

| Resource | Spec Methods | Status |
|----------|--------------|--------|
| Administrations | GET (list) | ✅ |
| Custom Fields | GET (list) | ✅ |
| Document Styles | GET (list) | ✅ |
| Financial Accounts | GET (list) | ✅ |
| Payments | GET (by ID only) | ✅ |
| Projects | Full CRUD | ✅ |
| Purchase Transactions | Full CRUD | ✅ |
| Recurring Sales Invoices | Full CRUD + sync + notes | ✅ |
| Tax Rates | GET (list) | ✅ |
| Users | GET (list, by ID) | ✅ |
| Verifications | GET (list) | ✅ |
| Contacts | Full CRUD + sync + sub-resources | ✅ (except archive) |
| Sales Invoices | Full CRUD + sync + payments + notes | ✅ (except downloads/status methods) |

---

## Summary of Issues

### ✅ Fixed
All critical bugs have been fixed:
- 5 requests now use correct HTTP method (PATCH)
- 2 requests now use correct endpoint names
- 1 request now sends state in body instead of URL

### Undocumented (May or May Not Work)
1. 5 sales invoice mark_as_* endpoints not in spec
2. 2 resources have sync methods not in spec (Products, Financial Statements) — External Sales Invoices sync is now official
3. Financial Statements GET methods not in spec
4. Ledger Accounts create() not in spec
5. Entire Import Mappings resource not in spec

### Missing from Library
1. 7 entire resources (Assets, Reports, Customer Portal, Downloads, SEPA, Workflows, Task Lists)
2. Various sub-methods on existing resources (incl. new time entry resume/stop and webhook activate/deactivate)

---

## Notes

- The OpenAPI spec uses `{format}` suffix (e.g., `.json`), but this library uses headers
- Undocumented endpoints should be tested against the live API before removal
