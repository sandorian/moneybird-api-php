<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\DocumentStyles;

class DocumentStylesResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "987654321",
                "name": "Default Style",
                "identity_id": "123123123",
                "default": true,
                "logo_hash": "abcdef123456",
                "logo_container_full_width": true,
                "logo_display_width": "100",
                "logo_position": "left",
                "background_hash": "123456abcdef",
                "paper_size": "a4",
                "address_position": "right",
                "font_family": "Helvetica",
                "color": "#336699",
                "language": "nl",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            },
            {
                "id": "987654321",
                "administration_id": "987654321",
                "name": "Alternative Style",
                "identity_id": "321321321",
                "default": false,
                "logo_hash": "fedcba654321",
                "logo_container_full_width": false,
                "logo_display_width": "80",
                "logo_position": "right",
                "background_hash": "654321fedcba",
                "paper_size": "letter",
                "address_position": "left",
                "font_family": "Arial",
                "color": "#993366",
                "language": "en",
                "created_at": "2023-01-02T12:00:00.000Z",
                "updated_at": "2023-01-02T12:00:00.000Z"
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "name": "Default Style",
            "identity_id": "123123123",
            "default": true,
            "logo_hash": "abcdef123456",
            "logo_container_full_width": true,
            "logo_display_width": "100",
            "logo_position": "left",
            "background_hash": "123456abcdef",
            "paper_size": "a4",
            "address_position": "right",
            "font_family": "Helvetica",
            "color": "#336699",
            "language": "nl",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }
}
