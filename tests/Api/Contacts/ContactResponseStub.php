<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Contacts;

class ContactResponseStub
{
    public static function get(): array
    {
        return [
            'id' => '419889276175517682',
            'administration_id' => 123,
            'company_name' => 'Sandorian Consultancy B.V.',
            'firstname' => null,
            'lastname' => 'Appleseed',
            'address1' => 'Hoofdstraat 12',
            'address2' => '',
            'zipcode' => '1234 AB',
            'city' => 'Amsterdam',
            'country' => 'NL',
            'phone' => '',
            'delivery_method' => 'Email',
            'customer_id' => '1',
            'tax_number' => '',
            'chamber_of_commerce' => '',
            'bank_account' => '',
            'attention' => '',
            'email' => 'info@example.com',
            'email_ubl' => true,
            'send_invoices_to_attention' => '',
            'send_invoices_to_email' => 'info@example.com',
            'send_estimates_to_attention' => '',
            'send_estimates_to_email' => 'info@example.com',
            'sepa_active' => false,
            'sepa_iban' => '',
            'sepa_iban_account_name' => '',
            'sepa_bic' => '',
            'sepa_mandate_id' => '',
            'sepa_mandate_date' => null,
            'sepa_sequence_type' => 'RCUR',
            'credit_card_number' => '',
            'credit_card_reference' => '',
            'credit_card_type' => null,
            'tax_number_validated_at' => null,
            'tax_number_valid' => null,
            'invoice_workflow_id' => null,
            'estimate_workflow_id' => null,
            'si_identifier' => '',
            'si_identifier_type' => null,
            'moneybird_payments_mandate' => false,
            'created_at' => '2024-05-02T13:47:20.143Z',
            'updated_at' => '2024-05-02T13:47:20.177Z',
            'version' => 1714657640,
            'sales_invoices_url' => 'https://moneybird.dev/123/sales_invoices/9f4409a02c42600a7cb10fafef75459dc3995e88e290d0ff7ac6d7c393c98a86/all',
            'notes' => [],
            'custom_fields' => [],
            'contact_people' => [
                [
                    'id' => '419889276181809140',
                    'contact_id' => '419889276175517682',
                    'administration_id' => 123,
                    'firstname' => 'John',
                    'lastname' => 'Appleseed',
                    'phone' => null,
                    'email' => null,
                    'department' => null,
                    'created_at' => '2024-05-02T13:47:20.149Z',
                    'updated_at' => '2024-05-02T13:47:20.149Z',
                    'version' => 1714657640,
                ],
            ],
            'archived' => false,
            'events' => [
                [
                    'administration_id' => 123,
                    'user_id' => 17146575975623,
                    'action' => 'contact_created',
                    'link_entity_id' => null,
                    'link_entity_type' => null,
                    'data' => [],
                    'created_at' => '2024-05-02T13:47:20.166Z',
                    'updated_at' => '2024-05-02T13:47:20.166Z',
                ],
            ],
        ];
    }
}
