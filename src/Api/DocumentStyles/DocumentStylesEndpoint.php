<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\DocumentStyles;

use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class DocumentStylesEndpoint extends BaseEndpoint
{
    /**
     * @return array<DocumentStyle>
     */
    public function all(): array
    {
        $request = new GetDocumentStylesRequest;

        return $this->client->send($request)->dtoOrFail();
    }

    public function get(string $documentStyleId): DocumentStyle
    {
        $request = new GetDocumentStyleRequest($documentStyleId);

        return $this->client->send($request)->dtoOrFail();
    }
}
