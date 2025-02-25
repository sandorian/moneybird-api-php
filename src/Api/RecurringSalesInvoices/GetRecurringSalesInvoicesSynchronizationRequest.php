<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;
use Sandorian\Moneybird\Api\Support\IdVersion;

class GetRecurringSalesInvoicesSynchronizationRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'recurring_sales_invoices/synchronization';
    }

    /**
     * @return array<IdVersion>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => IdVersion::createFromResponseData($data),
            $response->json()
        );
    }
}
