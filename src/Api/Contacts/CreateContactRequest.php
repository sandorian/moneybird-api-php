<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts;

use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateContactRequest extends BaseJsonPostRequest
{
    public function resolveEndpoint(): string
    {
        return 'contacts';
    }
}
