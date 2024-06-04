<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TaxRates;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class TaxRatesEndpoint extends BaseEndpoint
{
    public function paginate(): Paginator
    {
        $request = new GetTaxRatesPageRequest;

        return $this->client->paginate($request);
    }
}
