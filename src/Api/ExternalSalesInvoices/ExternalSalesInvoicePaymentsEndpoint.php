<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoicePaymentsEndpoint extends BaseEndpoint
{
    public function create(
        string $externalSalesInvoiceId,
        array $data
    ): Response {
        $request = new CreatePaymentForExternalSalesInvoiceRequest($externalSalesInvoiceId);
        $request->body()->merge($data);

        return $this->client->send($request);
    }
}
