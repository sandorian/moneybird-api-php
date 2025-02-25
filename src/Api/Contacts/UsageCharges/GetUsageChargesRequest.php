<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\UsageCharges;

use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetUsageChargesRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/usage_charges';
    }
}
