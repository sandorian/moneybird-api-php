<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Webhooks;

use Sandorian\Moneybird\Api\Support\BaseDto;

class Webhook extends BaseDto
{
    public string $id;

    public string $administration_id;

    public string $url;

    public array $events;

    public ?int $last_http_status;

    public ?string $last_http_body;

    public string $token;
}
