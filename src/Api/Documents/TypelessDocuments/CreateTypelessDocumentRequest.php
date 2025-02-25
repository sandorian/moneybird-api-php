<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;

class CreateTypelessDocumentRequest extends BaseJsonPostRequest
{
    /**
     * @param  array<string, mixed>  $typelessDocumentData
     */
    public function __construct(
        protected readonly array $typelessDocumentData,
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'documents/typeless_documents';
    }

    public function createDtoFromResponse(Response $response): TypelessDocument
    {
        return TypelessDocument::createFromResponseData($response->json());
    }

    protected function defaultBody(): array
    {
        return [
            'typeless_document' => $this->typelessDocumentData,
        ];
    }
}
