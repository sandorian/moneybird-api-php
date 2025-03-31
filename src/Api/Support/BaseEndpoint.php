<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Http\Request;
use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

abstract class BaseEndpoint
{
    public function __construct(
        protected readonly MoneybirdApiClient $client
    ) {}

    /**
     * @return mixed
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function create(array $data): BaseDto
    {
        $request = $this->getCreateRequest();

        // Use setEncapsulatedData if the method exists, otherwise fall back to merge
        /** @var object $request */
        if (method_exists($request, 'setEncapsulatedData')) {
            /** @var BaseJsonPostRequest|BaseJsonPatchRequest $request */
            $request->setEncapsulatedData($data);
        } else {
            $request->body()->merge($data);
        }

        return $this->client->send($request)->dtoOrFail();
    }

    protected function getCreateRequest(): ?Request
    {
        throw new \Exception('Endpoint method "create" not supported.');
    }

    protected function getGetRequest(): ?Request
    {
        throw new \Exception('Endpoint method "get" not supported.');
    }

    protected function getUpdateRequest(): ?Request
    {
        throw new \Exception('Endpoint method "update" not supported.');
    }

    protected function getDeleteRequest(): ?Request
    {
        throw new \Exception('Endpoint method "delete" not supported.');
    }

    public function paginate(): Paginator
    {
        return $this->client->paginate($this->getPaginateRequest());
    }

    protected function getPaginateRequest(): ?Request
    {
        throw new \Exception('Endpoint method "paginate" not supported.');
    }
}
