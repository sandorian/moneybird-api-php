<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class SalesInvoicePaymentsEndpoint extends BaseEndpoint
{
    public function registerForSalesInvoiceId(string $salesInvoiceId, array $data): SalesInvoicePayment
    {
        $request = new RegisterSalesInvoicePaymentRequest($salesInvoiceId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }
        $response = $this->client->send($request);

        return SalesInvoicePayment::createFromResponseData($response->json());
    }
}
