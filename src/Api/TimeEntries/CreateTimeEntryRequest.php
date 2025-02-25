<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateTimeEntryRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'time_entries';
    }

    public function createDtoFromResponse(Response $response): TimeEntry
    {
        return TimeEntry::createFromResponseData($response->json());
    }
}
