<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Sandorian\Moneybird\Api\Support\BaseDto;

class MbPaymentsMandateUrl extends BaseDto
{
    public function __construct(
        public readonly string $url,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            url: $data['url'],
        );
    }
}
