<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Estimates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class PostEstimatesSynchronizationRequest extends BaseJsonPostRequest
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
        return 'estimates/synchronization';
    }

    /**
     * @return array<Estimate>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => Estimate::createFromResponseData($data),
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
