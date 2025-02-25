<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateMbPaymentsMandateUrlRequest extends BaseJsonPostRequest
{
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/mb_payments_mandate_url';
    }

    public function createDtoFromResponse(Response $response): MbPaymentsMandateUrl
    {
        return MbPaymentsMandateUrl::createFromResponseData($response->json());
    }
}
