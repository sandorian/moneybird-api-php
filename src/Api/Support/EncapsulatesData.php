<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Api\Support;

/**
 * Trait for encapsulating request data within a resource-specific key
 * 
 * The Moneybird API requires data to be encapsulated within a specific key
 * that matches the singular name of the resource (e.g., 'contact' for Contacts).
 */
trait EncapsulatesData
{
    /**
     * Encapsulate data within the resource key if not already encapsulated
     */
    protected function encapsulateData(array $data): array
    {
        $resourceKey = $this->getResourceKey();

        // If the resource key is null or the data is already encapsulated, return as is
        if ($resourceKey === null || isset($data[$resourceKey])) {
            return $data;
        }

        // Encapsulate the data within the resource key
        return [$resourceKey => $data];
    }

    /**
     * Get the resource key for encapsulation (e.g., 'contact' for Contacts endpoint)
     * Override this method in specific request classes to provide the correct resource key
     */
    protected function getResourceKey(): ?string
    {
        return null;
    }
}
