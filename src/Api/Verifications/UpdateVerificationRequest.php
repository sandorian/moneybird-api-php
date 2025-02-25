<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPatchRequest;

class UpdateVerificationRequest extends BaseJsonPatchRequest
{
    public function __construct(
        protected readonly string $verificationId,
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
}
