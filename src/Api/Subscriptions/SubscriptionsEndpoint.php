<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class SubscriptionsEndpoint extends BaseEndpoint
{
    public function create(array $data): Subscription
    {
        $request = new CreateSubscriptionRequest($data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): Subscription
    {
        $request = new GetSubscriptionRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetSubscriptionsPageRequest;

        return $this->client->paginate($request);
    }

    public function update(string $subscriptionId, array $data): Subscription
    {
        $request = new UpdateSubscriptionRequest($subscriptionId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function delete(string $subscriptionId): void
    {
        $request = new DeleteSubscriptionRequest($subscriptionId);
        $this->client->send($request);
    }

    public function pause(string $subscriptionId): Subscription
    {
        $request = new PauseSubscriptionRequest($subscriptionId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function resume(string $subscriptionId): Subscription
    {
        $request = new ResumeSubscriptionRequest($subscriptionId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function reactivate(string $subscriptionId): Subscription
    {
        $request = new ReactivateSubscriptionRequest($subscriptionId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function duplicate(string $subscriptionId): Subscription
    {
        $request = new DuplicateSubscriptionRequest($subscriptionId);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }
}
