<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\FinancialMutations;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostFinancialMutationsSynchronizationRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string>  $ids
     */
    public function __construct(
        protected readonly array $ids,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'financial_mutations/synchronization';
    }

    /**
     * @return array<FinancialMutation>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => FinancialMutation::createFromResponseData($data),
            $response->json()
        );
    }

    protected function defaultBody(): array
    {
        return [
            'ids' => $this->ids,
        ];
    }
}
