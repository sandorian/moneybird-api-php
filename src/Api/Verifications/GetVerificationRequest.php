<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetVerificationRequest extends BaseJsonGetRequest
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
