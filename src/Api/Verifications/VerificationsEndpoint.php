<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Verifications;

use Saloon\PaginationPlugin\Paginator;
use Sandorian\Moneybird\Api\Support\BaseEndpoint;

class VerificationsEndpoint extends BaseEndpoint
{
    public function create(array $data): Verification
    {
        $request = new CreateVerificationRequest($data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function get(string $id): Verification
    {
        $request = new GetVerificationRequest($id);
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function paginate(): Paginator
    {
        $request = new GetVerificationsPageRequest;

        return $this->client->paginate($request);
    }

    public function update(string $verificationId, array $data): Verification
    {
        $request = new UpdateVerificationRequest($verificationId, $data);
        if (method_exists($request, 'setEncapsulatedData')) {
            $request->setEncapsulatedData($data);
        }
        $response = $this->client->send($request);

        return $request->createDtoFromResponse($response);
    }

    public function delete(string $verificationId): void
    {
        $request = new DeleteVerificationRequest($verificationId);
        $this->client->send($request);
    }
}
