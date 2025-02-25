<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\RecurringSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetRecurringSalesInvoicesRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'recurring_sales_invoices';
    }

    /**
     * @return array<RecurringSalesInvoice>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => RecurringSalesInvoice::createFromResponseData($data),
            $response->json()
        );
    }
}
