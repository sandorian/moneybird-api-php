<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TaxRates;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetTaxRatesPageRequest extends BaseJsonGetRequest implements Paginatable
{
    public function resolveEndpoint(): string
    {
        return 'tax_rates';
    }

    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => TaxRate::createFromResponseData($data),
            $response->json()
        );
    }
}
