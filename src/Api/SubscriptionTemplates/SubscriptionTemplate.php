<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Sandorian\Moneybird\Api\Support\BaseDto;

class SubscriptionTemplate extends BaseDto
{
    public static function createFromResponseData(array $data): static
    {
        return new static($data);
    }
}
