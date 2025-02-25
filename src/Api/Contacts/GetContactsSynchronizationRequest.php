<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseJsonGetRequest;

class GetContactsSynchronizationRequest extends BaseJsonGetRequest
{
    public function resolveEndpoint(): string
    {
        return 'contacts/synchronization';
    }
}
