<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateMbPaymentsMandateRequest extends BaseJsonPostRequest
{
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
}
