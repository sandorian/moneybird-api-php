<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class UpdateVerificationRequest extends BaseJsonPatchRequest
{
    use EncapsulatesData;

    /**
     * @param  array<string, mixed>  $data
     */
    public function __construct(
        protected readonly string $verificationId,
        protected readonly array $data = [],
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return "verifications/{$this->verificationId}";
    }

    public function createDtoFromResponse(Response $response): Verification
    {
        return Verification::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->data);
    }

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'verification' key
     */
    protected function getResourceKey(): string
    {
        return 'verification';
    }
}
