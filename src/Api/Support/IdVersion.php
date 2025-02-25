<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

class IdVersion extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly int $version,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            version: $data['version'],
        );
    }
}
