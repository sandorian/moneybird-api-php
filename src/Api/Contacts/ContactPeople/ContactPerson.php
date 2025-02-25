<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\ContactPeople;

use Sandorian\Moneybird\Api\Support\BaseDto;

class ContactPerson extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $contact_id,
        public readonly ?string $firstname,
        public readonly ?string $lastname,
        public readonly ?string $phone,
        public readonly ?string $email,
        public readonly ?string $department,
        public readonly ?bool $active,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            contact_id: $data['contact_id'],
            firstname: $data['firstname'] ?? null,
            lastname: $data['lastname'] ?? null,
            phone: $data['phone'] ?? null,
            email: $data['email'] ?? null,
            department: $data['department'] ?? null,
            active: $data['active'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
