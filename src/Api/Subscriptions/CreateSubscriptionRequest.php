<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Subscriptions;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateSubscriptionRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly array $data = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'subscriptions';
    }

    public function createDtoFromResponse(Response $response): Subscription
    {
        return Subscription::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'subscription' key
     */
    protected function getResourceKey(): string
    {
        return 'subscription';
    }
}
