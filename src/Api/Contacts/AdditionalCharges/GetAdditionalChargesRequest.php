<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\AdditionalCharges;

use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetAdditionalChargesRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/additional_charges';
    }
}
