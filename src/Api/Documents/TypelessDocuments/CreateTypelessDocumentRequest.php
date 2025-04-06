<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\TypelessDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateTypelessDocumentRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'typeless_document' key
     */
    protected function getResourceKey(): string
    {
        return 'typeless_document';
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->typelessDocumentData);
    }
}
