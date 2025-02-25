<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteTimeEntryRequest extends BaseJsonDeleteRequest
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
}
