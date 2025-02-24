<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SalesInvoices\Payments;

use Sandorian\Moneybird\Api\Support\BaseDto;

class SalesInvoicePayment extends BaseDto
{
    public string $id;
    public string $administration_id;
    public string $invoice_id;
    public string $payment_date;
    public string $price;
    public string $price_base;
    public string $payment_method;
    public string $created_at;
    public string $updated_at;

    public static function createFromResponseData(array $data): static
    {
        $instance = new static();
        foreach ($data as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->{$key} = $value;
            }
        }
        return $instance;
    }
}
