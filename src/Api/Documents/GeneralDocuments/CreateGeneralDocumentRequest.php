<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Documents\GeneralDocuments;

use Saloon\Http\Response;
use Sandorian\Moneybird\Api\Support\BaseJsonPostRequest;
use Sandorian\Moneybird\Api\Support\EncapsulatesData;

class CreateGeneralDocumentRequest extends BaseJsonPostRequest
{
    use EncapsulatesData;

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

    /**
     * Get the resource key for encapsulation
     *
     * The Moneybird API requires data to be encapsulated within a 'general_document' key
     */
    protected function getResourceKey(): string
    {
        return 'general_document';
    }

    protected function defaultBody(): array
    {
        return $this->encapsulateData($this->generalDocumentData);
    }
}
