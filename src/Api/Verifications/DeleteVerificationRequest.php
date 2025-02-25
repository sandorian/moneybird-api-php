<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteVerificationRequest extends BaseJsonDeleteRequest
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
}
