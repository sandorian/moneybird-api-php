<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class SendEstimateEmailRequest extends BaseJsonPatchRequest
{
    /**
     * @param  array<string, mixed>  $emailData
     */
    public function __construct(
        protected readonly string $estimateId,
        protected readonly array $emailData = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId.'/send_estimate';
    }

    public function createDtoFromResponse(Response $response): Estimate
    {
        return Estimate::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        if (empty($this->emailData)) {
            return [];
        }

        return [
            'estimate_sending' => $this->emailData,
        ];
    }
}
