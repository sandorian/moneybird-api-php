<?php

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Contact extends BaseDto
{
    public string $id;

    public string $administration_id;

    public ?string $company_name;

    public ?string $firstname;

    public ?string $lastname;

    public ?string $address1;

    public ?string $address2;

    public ?string $zipcode;

    public ?string $city;

    public ?string $country;

    public ?string $phone;

    public ?string $delivery_method;

    public ?string $customer_id;

    public ?string $tax_number;

    public ?string $chamber_of_commerce;

    public ?string $bank_account;

    public ?string $attention;

    public ?string $email;

    public bool $email_ubl;

    public ?string $send_invoices_to_attention;

    public ?string $send_invoices_to_email;

    public ?string $send_estimates_to_attention;

    public ?string $send_estimates_to_email;

    public bool $sepa_active;

    public ?string $sepa_iban;

    public ?string $sepa_iban_account_name;

    public ?string $sepa_bic;

    public ?string $sepa_mandate_id;

    public ?string $sepa_mandate_date;

    public ?string $sepa_sequence_type;

    public ?string $credit_card_number;

    public ?string $credit_card_reference;

    public ?string $credit_card_type;

    public ?string $tax_number_validated_at;

    public ?bool $tax_number_valid;

    public ?string $invoice_workflow_id;

    public ?string $estimate_workflow_id;

    public ?string $si_identifier;

    public ?string $si_identifier_type;

    public bool $moneybird_payments_mandate;

    public string $created_at;

    public string $updated_at;

    public int $version;

    public string $sales_invoices_url;

    public array $notes;

    public array $custom_fields;

    public array $contact_people;

    public bool $archived;

    public array $events;
}
