<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\SubscriptionTemplates;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateSubscriptionTemplateRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $subscriptionTemplateId,
        protected readonly array $data = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "subscription_templates/{$this->subscriptionTemplateId}";
    }

    public function createDtoFromResponse(Response $response): SubscriptionTemplate
    {
        return SubscriptionTemplate::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'subscription_template' key
     */
    protected function getResourceKey(): string
    {
        return 'subscription_template';
    }
}
