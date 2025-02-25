<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateGeneralDocumentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $generalDocumentData
     */
    public function __construct(
        protected readonly array $generalDocumentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/general_documents';
    }

    public function createDtoFromResponse(Response $response): GeneralDocument
    {
        return GeneralDocument::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'general_document' => $this->generalDocumentData,
        ];
    }
}
