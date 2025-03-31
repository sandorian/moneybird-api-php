<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\TimeEntries;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class TimeEntriesEndpoint extends BaseEndpoint
{
    public function create(array $data): TimeEntry
    {
        $request = new CreateTimeEntryRequest;
        $request->body()->merge([
            'time_entry' => $data,
        ]);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): TimeEntry
    {
        $request = new GetTimeEntryRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetTimeEntriesPageRequest;

        return $this->client->paginate($request);
    }

    public function update(string $timeEntryId, array $data): TimeEntry
    {
        $request = new UpdateTimeEntryRequest($timeEntryId);
        $request->body()->merge([
            'time_entry' => $data,
        ]);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function delete(string $timeEntryId): void
    {
        $request = new DeleteTimeEntryRequest($timeEntryId);
        $this->client->send($request);
    }
}
