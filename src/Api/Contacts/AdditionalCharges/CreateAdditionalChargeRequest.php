<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\AdditionalCharges;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateAdditionalChargeRequest extends BaseJsonPostRequest
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

    public function createDtoFromResponse(Response $response): AdditionalCharge
    {
        return AdditionalCharge::createFromResponseData($response->json());
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'additional_charge' key
     */
    protected function getResourceKey(): string
    {
        return 'additional_charge';
    }
}
