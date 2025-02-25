<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Payments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetPaymentRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $paymentId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'payments/'.$this->paymentId;
    }

    public function createDtoFromResponse(Response $response): Payment
    {
        return Payment::createFromResponseData($response->json());
    }
}
