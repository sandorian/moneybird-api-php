<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Contacts\Notes;

use Sandorian\Moneybird\Api\Support\BaseJsonDeleteRequest;

class DeleteNoteRequest extends BaseJsonDeleteRequest
{
    public function __construct(
        protected readonly string $contactId,
        protected readonly string $noteId,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'contacts/'.$this->contactId.'/notes/'.$this->noteId;
    }
}
