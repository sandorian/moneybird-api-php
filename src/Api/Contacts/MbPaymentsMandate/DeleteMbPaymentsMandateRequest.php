<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\MbPaymentsMandate;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteMbPaymentsMandateRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $contactId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/mb_payments_mandate';
    }
}
