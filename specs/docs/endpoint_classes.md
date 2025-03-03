# Moneybird API PHP - Endpoint Classes

This document provides a comprehensive list of all endpoint classes in the Moneybird API PHP library.

## Endpoint Classes

1. [x] **AdministrationsEndpoint** - `/src/Api/Administrations/AdministrationsEndpoint.php`
2. [x] **ContactsEndpoint** - `/src/Api/Contacts/ContactsEndpoint.php`
3. [x] **CustomFieldsEndpoint** - `/src/Api/CustomFields/CustomFieldsEndpoint.php`
4. [x] **DocumentStylesEndpoint** - `/src/Api/DocumentStyles/DocumentStylesEndpoint.php`
5. [x] **EstimatesEndpoint** - `/src/Api/Estimates/EstimatesEndpoint.php`
6. [x] **ExternalSalesInvoicesEndpoint** - `/src/Api/ExternalSalesInvoices/ExternalSalesInvoicesEndpoint.php`
7. [x] **ExternalSalesInvoiceAttachmentsEndpoint** - `/src/Api/ExternalSalesInvoices/Attachments/ExternalSalesInvoiceAttachmentsEndpoint.php`
8. [x] **ExternalSalesInvoicePaymentsEndpoint** - `/src/Api/ExternalSalesInvoices/Payments/ExternalSalesInvoicePaymentsEndpoint.php`
9. [x] **FinancialAccountsEndpoint** - `/src/Api/FinancialAccounts/FinancialAccountsEndpoint.php`
10. [x] **FinancialMutationsEndpoint** - `/src/Api/FinancialMutations/FinancialMutationsEndpoint.php`
11. [x] **FinancialStatementsEndpoint** - `/src/Api/FinancialStatements/FinancialStatementsEndpoint.php`
12. [x] **GeneralDocumentsEndpoint** - `/src/Api/Documents/GeneralDocuments/GeneralDocumentsEndpoint.php`
13. [x] **GeneralJournalDocumentsEndpoint** - `/src/Api/Documents/GeneralJournalDocuments/GeneralJournalDocumentsEndpoint.php`
14. [x] **IdentitiesEndpoint** - `/src/Api/Identities/IdentitiesEndpoint.php`
15. [x] **ImportMappingsEndpoint** - `/src/Api/ImportMappings/ImportMappingsEndpoint.php`
16. [x] **LedgerAccountsEndpoint** - `/src/Api/LedgerAccounts/LedgerAccountsEndpoint.php`
17. [x] **PaymentsEndpoint** - `/src/Api/Payments/PaymentsEndpoint.php`
18. [x] **ProductsEndpoint** - `/src/Api/Products/ProductsEndpoint.php`
19. [x] **ProjectsEndpoint** - `/src/Api/Projects/ProjectsEndpoint.php`
20. [x] **PurchaseInvoicesEndpoint** - `/src/Api/Documents/PurchaseInvoices/PurchaseInvoicesEndpoint.php`
21. [x] **PurchaseTransactionsEndpoint** - `/src/Api/PurchaseTransactions/PurchaseTransactionsEndpoint.php`
22. [x] **ReceiptsEndpoint** - `/src/Api/Documents/Receipts/ReceiptsEndpoint.php`
23. [x] **RecurringSalesInvoicesEndpoint** - `/src/Api/RecurringSalesInvoices/RecurringSalesInvoicesEndpoint.php`
24. [x] **SalesInvoicesEndpoint** - `/src/Api/SalesInvoices/SalesInvoicesEndpoint.php`
25. [x] **SalesInvoicePaymentsEndpoint** - `/src/Api/SalesInvoices/Payments/SalesInvoicePaymentsEndpoint.php`
26. [x] **SubscriptionsEndpoint** - `/src/Api/Subscriptions/SubscriptionsEndpoint.php`
27. [x] **SubscriptionTemplatesEndpoint** - `/src/Api/SubscriptionTemplates/SubscriptionTemplatesEndpoint.php`
28. [x] **TaxRatesEndpoint** - `/src/Api/TaxRates/TaxRatesEndpoint.php`
29. [x] **TimeEntriesEndpoint** - `/src/Api/TimeEntries/TimeEntriesEndpoint.php`
30. [x] **TypelessDocumentsEndpoint** - `/src/Api/Documents/TypelessDocuments/TypelessDocumentsEndpoint.php`
31. [x] **UsersEndpoint** - `/src/Api/Users/UsersEndpoint.php`
32. [x] **VerificationsEndpoint** - `/src/Api/Verifications/VerificationsEndpoint.php`
33. [x] **WebhooksEndpoint** - `/src/Api/Webhooks/WebhooksEndpoint.php`

## Base Endpoint

All endpoint classes extend the abstract `BaseEndpoint` class located at `/src/Api/Support/BaseEndpoint.php`, which provides common functionality for API operations like create, get, update, delete, and pagination. Each endpoint corresponds to a specific resource in the Moneybird API.