<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

#[\AllowDynamicProperties]
abstract class BaseDto
{
    public static function createFromResponseData(array $data)
    {
        $dto = new static;

        foreach ($data as $key => $value) {
            $dto->$key = $value;
        }

        return $dto;
    }
}
