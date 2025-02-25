<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteContactRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        private readonly string $contactId
    ) {}

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId;
    }
}
