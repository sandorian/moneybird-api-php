<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

use Saloon\Http\Request;
use Sandorian\Moneybird\Api\MoneybirdApiClient;

abstract class BaseEndpoint
{
    public function __construct(
        protected readonly MoneybirdApiClient $client
    ) {}

    /**
     * @param array $data
     * @return mixed
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function create(array $data): BaseDto
    {
        $request = $this->getCreateRequest();

        $request->body()->merge($data);

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

}
