<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Verification extends BaseDto
{
    public static function createFromResponseData(array $data): static
    {
        return new static($data);
    }
}
