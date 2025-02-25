<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\UsageCharges;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateUsageChargeRequest extends BaseJsonPostRequest
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

    public function createDtoFromResponse(Response $response): UsageCharge
    {
        return UsageCharge::createFromResponseData($response->json());
    }
}
