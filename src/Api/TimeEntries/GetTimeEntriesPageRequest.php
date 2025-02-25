<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetTimeEntriesPageRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'time_entries';
    }

    /**
     * @return array<TimeEntry>
     */
    public function createDtoFromResponse(Response $response): array
    {
        return array_map(
            fn (array $data) => TimeEntry::createFromResponseData($data),
            $response->json()
        );
    }
}
