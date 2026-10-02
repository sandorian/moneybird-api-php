<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseDto;

final class ContactDuplicateGroup extends BaseDto
{
    /**
     * @var array<Contact>
     */
    public array $contacts = [];

    public static function createFromResponseData(array $data): static
    {
        $dto = new self;

        $dto->contacts = array_map(
            fn (array $contact) => Contact::createFromResponseData($contact),
            $data['contacts'] ?? []
        );

        return $dto;
    }
}
