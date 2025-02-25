<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetSendEstimateEmailTemplateRequest extends BaseJsonGetRequest
{
    public function __construct(
        protected readonly string $estimateId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'estimates/'.$this->estimateId.'/send_email_template';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
