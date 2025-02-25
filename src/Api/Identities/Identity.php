<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Identities;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Identity extends BaseDto
{
    /**
     * @param  array<string, mixed>|null  $custom_fields
     * @param  array<string, mixed>|null  $tax_rates
     */
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly ?string $company_name = null,
        public readonly ?string $city = null,
        public readonly ?string $country = null,
        public readonly ?string $zipcode = null,
        public readonly ?string $address1 = null,
        public readonly ?string $address2 = null,
        public readonly ?string $email = null,
        public readonly ?string $phone = null,
        public readonly ?string $delivery_method = null,
        public readonly ?string $customer_id = null,
        public readonly ?string $tax_number = null,
        public readonly ?string $chamber_of_commerce = null,
        public readonly ?string $bank_account = null,
        public readonly ?string $attention = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
        public readonly ?array $custom_fields = null,
        public readonly ?array $tax_rates = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            company_name: $data['company_name'] ?? null,
            city: $data['city'] ?? null,
            country: $data['country'] ?? null,
            zipcode: $data['zipcode'] ?? null,
            address1: $data['address1'] ?? null,
            address2: $data['address2'] ?? null,
            email: $data['email'] ?? null,
            phone: $data['phone'] ?? null,
            delivery_method: $data['delivery_method'] ?? null,
            customer_id: $data['customer_id'] ?? null,
            tax_number: $data['tax_number'] ?? null,
            chamber_of_commerce: $data['chamber_of_commerce'] ?? null,
            bank_account: $data['bank_account'] ?? null,
            attention: $data['attention'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            custom_fields: $data['custom_fields'] ?? null,
            tax_rates: $data['tax_rates'] ?? null,
        );
    }
}
