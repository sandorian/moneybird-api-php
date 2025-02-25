<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\DocumentStyles;

use Sandorian\Moneybird\Api\Support\BaseDto;

class DocumentStyle extends BaseDto
{
    public function __construct(
        public readonly string $id,
        public readonly string $administration_id,
        public readonly string $name,
        public readonly string $identity_id,
        public readonly ?bool $default = null,
        public readonly ?string $logo_hash = null,
        public readonly ?bool $logo_container_full_width = null,
        public readonly ?string $logo_display_width = null,
        public readonly ?string $logo_position = null,
        public readonly ?string $background_hash = null,
        public readonly ?string $paper_size = null,
        public readonly ?string $address_position = null,
        public readonly ?string $font_family = null,
        public readonly ?string $color = null,
        public readonly ?string $language = null,
        public readonly ?string $created_at = null,
        public readonly ?string $updated_at = null,
    ) {
        //
    }

    public static function createFromResponseData(array $data): static
    {
        return new static(
            id: $data['id'],
            administration_id: $data['administration_id'],
            name: $data['name'],
            identity_id: $data['identity_id'],
            default: isset($data['default']) ? (bool) $data['default'] : null,
            logo_hash: $data['logo_hash'] ?? null,
            logo_container_full_width: isset($data['logo_container_full_width']) ? (bool) $data['logo_container_full_width'] : null,
            logo_display_width: $data['logo_display_width'] ?? null,
            logo_position: $data['logo_position'] ?? null,
            background_hash: $data['background_hash'] ?? null,
            paper_size: $data['paper_size'] ?? null,
            address_position: $data['address_position'] ?? null,
            font_family: $data['font_family'] ?? null,
            color: $data['color'] ?? null,
            language: $data['language'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
