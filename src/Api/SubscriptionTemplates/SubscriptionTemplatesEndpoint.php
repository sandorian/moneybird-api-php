<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class SubscriptionTemplatesEndpoint extends BaseEndpoint
{
    public function create(array $data): SubscriptionTemplate
    {
        $request = new CreateSubscriptionTemplateRequest;
        $request->body()->merge($data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): SubscriptionTemplate
    {
        $request = new GetSubscriptionTemplateRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetSubscriptionTemplatesPageRequest;

        return $this->client->paginate($request);
    }

    public function update(string $subscriptionTemplateId, array $data): SubscriptionTemplate
    {
        $request = new UpdateSubscriptionTemplateRequest($subscriptionTemplateId);
        $request->body()->merge($data);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function delete(string $subscriptionTemplateId): void
    {
        $request = new DeleteSubscriptionTemplateRequest($subscriptionTemplateId);
        $this->client->send($request);
    }
}
