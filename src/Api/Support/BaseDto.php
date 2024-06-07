<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

abstract class BaseDto
{
    public static function createFromResponseData(array $data)
    {
        $dto = new static;

        foreach ($data as $key => $value) {
            if (property_exists($dto, $key)) {
                $dto->$key = $value;
            }
        }

        return $dto;
    }
}
