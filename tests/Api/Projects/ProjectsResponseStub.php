<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Projects;

class ProjectsResponseStub
{
    public static function getProjects(): string
    {
        return '[
            {
                "id": "123456789012345678",
                "administration_id": "123456789012345678",
                "name": "Test Project",
                "state": "active",
                "note": "Test Note",
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z"
            }
        ]';
    }

    public static function getProject(): string
    {
        return '{
            "id": "123456789012345678",
            "administration_id": "123456789012345678",
            "name": "Test Project",
            "state": "active",
            "note": "Test Note",
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z"
        }';
    }

    public static function createProject(): string
    {
        return self::getProject();
    }

    public static function updateProject(): string
    {
        return self::getProject();
    }

    public static function deleteProject(): string
    {
        return '';
    }
}
