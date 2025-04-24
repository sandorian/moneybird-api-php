<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\PagedPaginator;

use function Kelunik\LinkHeaderRfc5988\parseLinks;

class MoneybirdPaginator extends PagedPaginator
{
    protected ?int $perPageLimit = 100;

    protected int $startPage = 1;

    public function __construct(Connector $connector, Request $request)
    {
        parent::__construct($connector, $request);
    }

    protected function isLastPage(Response $response): bool
    {
        $header = $response->header('Link');

        if (is_null($header)) {
            return true;
        }

        $links = $this->parseResponseLinks($header);

        return is_null($links->getByRel('next'));
    }

    protected function getPageItems(Response $response, Request $request): array
    {
        return $this->request->createDtoFromResponse($response);
    }

    protected function parseResponseLinks($rawLinks)
    {
        return parseLinks($rawLinks);
    }
}
