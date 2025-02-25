<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class LinkBookingToFinancialMutationRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $financialMutationId,
        protected readonly array $data,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'financial_mutations/'.$this->financialMutationId.'/link_booking';
    }

    public function createDtoFromResponse(Response $response): FinancialMutation
    {
        return FinancialMutation::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->data;
    }
}
