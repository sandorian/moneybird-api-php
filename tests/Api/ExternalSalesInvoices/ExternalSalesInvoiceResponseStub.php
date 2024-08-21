<?php
declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\ExternalSalesInvoices;

class ExternalSalesInvoiceResponseStub
{
    public static function get(): array
    {
        return [
            "id" => "426664163463398887",
            "administration_id" => 123,
            "contact_id" => "426664163441378788",
            "contact" => [
                "id" => "426664163441378788",
                "administration_id" => 123,
                "company_name" => "Relation 1",
                "firstname" => null,
                "lastname" => null,
                "address1" => null,
                "address2" => null,
                "zipcode" => null,
                "city" => null,
                "country" => "NL",
                "phone" => null,
                "delivery_method" => "Email",
                "customer_id" => "55ab3a80d8c13281ae83ed6c68fa75d50b2f18b6a2e3151c691f623238c8e276",
                "tax_number" => null,
                "chamber_of_commerce" => null,
                "bank_account" => null,
                "attention" => null,
                "email" => null,
                "email_ubl" => false,
                "send_invoices_to_attention" => null,
                "send_invoices_to_email" => null,
                "send_estimates_to_attention" => null,
                "send_estimates_to_email" => null,
                "sepa_active" => false,
                "sepa_iban" => null,
                "sepa_iban_account_name" => null,
                "sepa_bic" => null,
                "sepa_mandate_id" => null,
                "sepa_mandate_date" => null,
                "sepa_sequence_type" => "RCUR",
                "credit_card_number" => null,
                "credit_card_reference" => null,
                "credit_card_type" => null,
                "tax_number_validated_at" => null,
                "tax_number_valid" => null,
                "invoice_workflow_id" => null,
                "estimate_workflow_id" => null,
                "si_identifier" => null,
                "si_identifier_type" => null,
                "moneybird_payments_mandate" => false,
                "created_at" => "2024-07-16T08:31:16.125Z",
                "updated_at" => "2024-07-16T08:31:16.125Z",
                "version" => 1721118676,
                "sales_invoices_url" => "https://moneybird.dev/123/sales_invoices/9d43bbecd221e501cb1fab5ecb35ec07b6e39e55dcc121adc56b70c22a5f73b2/all",
                "notes" => [],
                "custom_fields" => [],
                "contact_people" => [],
                "archived" => false
            ],
            "date" => "2024-07-16",
            "state" => "open",
            "due_date" => null,
            "reference" => "Invoice 1",
            "entry_number" => 101,
            "origin" => null,
            "source" => null,
            "source_url" => null,
            "currency" => "EUR",
            "paid_at" => null,
            "created_at" => "2024-07-16T08:31:16.147Z",
            "updated_at" => "2024-07-16T08:31:16.150Z",
            "version" => 1721118676,
            "details" => [
                [
                    "id" => "426664163465496040",
                    "administration_id" => 123,
                    "tax_rate_id" => "426664163451864550",
                    "ledger_account_id" => "426664163447670245",
                    "project_id" => null,
                    "product_id" => null,
                    "amount" => "1 x",
                    "amount_decimal" => "1.0",
                    "description" => "Invoice detail description",
                    "price" => "100.0",
                    "period" => null,
                    "row_order" => 0,
                    "total_price_excl_tax_with_discount" => "100.0",
                    "total_price_excl_tax_with_discount_base" => "100.0",
                    "tax_report_reference" => [],
                    "mandatory_tax_text" => null,
                    "created_at" => "2024-07-16T08:31:16.148Z",
                    "updated_at" => "2024-07-16T08:31:16.148Z"
                ]
            ],
            "payments" => [],
            "total_paid" => "0.0",
            "total_unpaid" => "121.0",
            "total_unpaid_base" => "121.0",
            "prices_are_incl_tax" => false,
            "total_price_excl_tax" => "100.0",
            "total_price_excl_tax_base" => "100.0",
            "total_price_incl_tax" => "121.0",
            "total_price_incl_tax_base" => "121.0",
            "marked_dubious_on" => null,
            "marked_uncollectible_on" => null,
            "notes" => [],
            "attachments" => [],
            "events" => [],
            "tax_totals" => [
                [
                    "tax_rate_id" => "426664163451864550",
                    "taxable_amount" => "100.0",
                    "taxable_amount_base" => "100.0",
                    "tax_amount" => "21.0",
                    "tax_amount_base" => "21.0"
                ]
            ]
        ];
    }
}


