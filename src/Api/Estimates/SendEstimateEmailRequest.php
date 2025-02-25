<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class SendEstimateEmailRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $emailData
     */
    public function __construct(
        protected readonly string $estimateId,
        protected readonly array $emailData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId.'/send_email';
    }

    public function createDtoFromResponse(Response $response): Estimate
    {
        return Estimate::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'estimate_sending' => $this->emailData,
        ];
    }
}
