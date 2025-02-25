<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Subscription extends BaseDto
{
    public static function createFromResponseData(array $data): static
    {
        return new static($data);
    }
}
