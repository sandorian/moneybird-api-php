# OpenAPI Spec Comparison Backlog

This document tracks the differences between this PHP library and the official Moneybird OpenAPI specification.

**Last Updated**: 2025-01-07
**OpenAPI Spec Version**: v2-20251223-d1277b6a05
**Spec File**: `openapi-specs/openapi-2025-01-07.yml`

---

## Legend

- 🐛 **Incorrect Implementation** - Bug that needs fixing
- ❓ **Not in Spec** - Implemented but not in OpenAPI spec (may be undocumented/legacy)
- ❌ **Not Implemented** - Entire resource missing from library
- ⚠️ **Partially Implemented** - Some methods/endpoints missing
- ✅ **Fully Implemented** - Matches OpenAPI spec

---

## 🐛 Incorrect Implementations (Bugs)

These existing implementations don't match the OpenAPI spec and may fail.

### Sales Invoices

#### `SendSalesInvoiceEmailRequest`
**File:** `src/Api/SalesInvoices/SendSalesInvoiceEmailRequest.php`

| Issue | Current | Should Be |
|-------|---------|-----------|
| HTTP Method | POST | **PATCH** |
| Endpoint | `send_email` | **`send_invoice`** |

---

#### `DuplicateSalesInvoiceToCreditInvoiceRequest`
**File:** `src/Api/SalesInvoices/DuplicateSalesInvoiceToCreditInvoiceRequest.php`

| Issue | Current | Should Be |
|-------|---------|-----------|
| HTTP Method | POST | **PATCH** |

---

#### `MarkSalesInvoiceAsUncollectibleRequest`
**File:** `src/Api/SalesInvoices/MarkSalesInvoiceAsUncollectibleRequest.php`

| Issue | Current | Should Be |
|-------|---------|-----------|
| HTTP Method | POST | **PATCH** |

---

### Estimates

#### `SendEstimateEmailRequest`
**File:** `src/Api/Estimates/SendEstimateEmailRequest.php`

| Issue | Current | Should Be |
|-------|---------|-----------|
| HTTP Method | POST | **PATCH** |
| Endpoint | `send_email` | **`send_estimate`** |

Body wrapper `estimate_sending` is correct.

---

#### `ChangeEstimateStateRequest`
**File:** `src/Api/Estimates/ChangeEstimateStateRequest.php`

| Issue | Current | Should Be |
|-------|---------|-----------|
| State parameter | URL path (`/change_state/{state}`) | **Request body** (`{"state": "value"}`) |

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
| External Sales Invoices | `getSynchronization()`, `synchronize()` | ❌ No |

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
- `POST/DELETE /{administration_id}/assets/{id}/sources` - Manage sources
- `POST /{administration_id}/assets/{id}/value_changes/*` - Value changes (arbitrary, divestment, full_depreciation, manual, retroactive)

---

### Reports
Analytical reports for the administration.

**Endpoints needed:**
- Balance sheet, Cash flow, Profit & loss
- Creditors, Debtors
- Revenue/Expenses by contact/project
- General ledger, Journal entries
- Tax report, Subscriptions report
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

**Note:** Synchronization methods exist but are NOT in spec.

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
**Missing:** Notes sub-resource (CRUD)

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

### Critical (Will Fail)
1. 5 requests use wrong HTTP method (POST instead of PATCH)
2. 2 requests use wrong endpoint names (send_email vs send_invoice/send_estimate)
3. 1 request sends state in URL instead of body

### Undocumented (May or May Not Work)
1. 5 sales invoice mark_as_* endpoints not in spec
2. 3 resources have sync methods not in spec (Products, Financial Statements, External Sales Invoices)
3. Financial Statements GET methods not in spec
4. Ledger Accounts create() not in spec
5. Entire Import Mappings resource not in spec

### Missing from Library
1. 6 entire resources (Assets, Reports, Customer Portal, Downloads, SEPA, Workflows)
2. Various sub-methods on existing resources

---

## Notes

- The OpenAPI spec uses `{format}` suffix (e.g., `.json`), but this library uses headers
- HTTP method differences (POST vs PATCH) may work on lenient servers but should be fixed
- Undocumented endpoints should be tested against the live API before removal
