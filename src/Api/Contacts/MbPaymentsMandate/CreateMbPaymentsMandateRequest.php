<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateMbPaymentsMandateRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  string  $contactId  The ID of the contact to create a Moneybird payments mandate for
     */
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/mb_payments_mandate';
    }

    public function createDtoFromResponse(Response $response): MbPaymentsMandate
    {
        return MbPaymentsMandate::createFromResponseData($response->json());
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'moneybird_payments_mandate' key
     */
    protected function getResourceKey(): string
    {
        return 'moneybird_payments_mandate';
    }

    /**
     * Get the default body for the request
     *
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [];
    }
}
