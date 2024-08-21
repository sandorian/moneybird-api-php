<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\ExternalSalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class ExternalSalesInvoicePaymentsEndpoint extends BaseEndpoint
{
    public function createForExternalSalesInvoiceId(
        string $externalSalesInvoiceId,
        array $data
    ): ExternalSalesInvoicePayment {
        $request = new CreatePaymentForExternalSalesInvoiceRequest($externalSalesInvoiceId);
        $request->body()->merge($data);

        return $this->client->send($request)->dtoOrFail();
    }
}
