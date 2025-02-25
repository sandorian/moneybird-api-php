<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateTimeEntryRequest extends BaseJsonPatchRequest
{
    public function __construct(
        protected readonly string $timeEntryId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "time_entries/{$this->timeEntryId}";
    }

    public function createDtoFromResponse(Response $response): TimeEntry
    {
        return TimeEntry::createFromResponseData($response->json());
    }
}
