<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\ContactPeople;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteContactPersonRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $contactId,
        protected readonly string $contactPersonId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/contact_people/'.$this->contactPersonId;
    }
}
