<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class FilterContactsRequest extends BaseJsonGetRequest implements Paginatable
{
    public function __construct(
        private readonly array $filters = []
    ) {}

    public function resolveEndpoint(): string
    {
        return 'contacts/filter';
    }

    protected function defaultQuery(): array
    {
        return $this->filters;
    }

    public function createDtoFromResponse(Response $response): Contact
    {
        return Contact::createFromResponseData($response->json());
    }
}
