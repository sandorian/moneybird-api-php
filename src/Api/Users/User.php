<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Users;

use Sandorian\Moneybird\Api\Support\BaseDto;

class User extends BaseDto
{
    public static function createFromResponseData(array $data): static
    {
        return new static($data);
    }
}
