<?php

namespace Sandorian\Moneybird\Api\Administrations;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Administration extends BaseDto
{
    public string $id;

    public string $name;

    public string $language;

    public string $currency;

    public string $country;

    public string $time_zone;

    public string $created_at;

    public string $updated_at;
}
