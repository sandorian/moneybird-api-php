<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Sandorian\Moneybird\Api\Support\BaseDto;

class TimeEntry extends BaseDto
{
    public static function createFromResponseData(array $data): static
    {
        return new static($data);
    }
}
