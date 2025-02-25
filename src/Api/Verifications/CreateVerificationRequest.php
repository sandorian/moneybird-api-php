<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateVerificationRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'verifications';
    }

    public function createDtoFromResponse(Response $response): Verification
    {
        return Verification::createFromResponseData($response->json());
    }
}
