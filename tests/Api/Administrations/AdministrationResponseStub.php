<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Administrations;

class AdministrationResponseStub
{
    public static function get(): array
    {
        return [
            'id' => '123456789',
            'name' => 'Test Administration',
            'language' => 'nl',
            'currency' => 'EUR',
            'country' => 'NL',
            'time_zone' => 'Europe/Amsterdam',
            'created_at' => '2023-01-01T12:00:00.000Z',
            'updated_at' => '2023-01-01T12:00:00.000Z',
        ];
    }

    public static function getAll(): array
    {
        return [
            self::get(),
            [
                'id' => '987654321',
                'name' => 'Another Administration',
                'language' => 'en',
                'currency' => 'USD',
                'country' => 'US',
                'time_zone' => 'America/New_York',
                'created_at' => '2023-01-01T12:00:00.000Z',
                'updated_at' => '2023-01-01T12:00:00.000Z',
            ],
        ];
    }
}
