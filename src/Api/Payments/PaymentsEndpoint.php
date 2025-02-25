<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Payments;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;
use Sandorian\Moneybird\Api\Support\MoneybirdPaginator;

class PaymentsEndpoint extends BaseEndpoint
{
    /**
     * @return Paginator<Payment>
     */
    public function paginate(): Paginator
    {
        $request = new GetPaymentsRequest;

        return new MoneybirdPaginator($this->client, $request);
    }

    /**
     * @return array<Payment>
     */
    public function all(): array
    {
        $request = new GetPaymentsRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $paymentId): Payment
    {
        $request = new GetPaymentRequest($paymentId);

        return $this->client->send($request)->dtoOrFail();
    }
}
