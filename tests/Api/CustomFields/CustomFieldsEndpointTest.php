<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\CustomFields;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\CustomFields\CustomField;
use Sandorian\Moneybird\Api\CustomFields\GetCustomFieldRequest;
use Sandorian\Moneybird\Api\CustomFields\GetCustomFieldsRequest;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class CustomFieldsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetCustomFieldsRequest::class => MockResponse::make(
                CustomFieldsResponseStub::getAll(),
                200
            ),
            GetCustomFieldRequest::class => MockResponse::make(
                CustomFieldsResponseStub::get(),
                200
            ),
        ]);
    }

    public function test_it_can_get_all_custom_fields(): void
    {
        $customFields = $this->client->customFields()->all();

        $this->assertCount(2, $customFields);
        $this->assertInstanceOf(CustomField::class, $customFields[0]);
        $this->assertEquals('123456789', $customFields[0]->id);
        $this->assertEquals('Test Custom Field', $customFields[0]->name);
        $this->assertEquals('987654321', $customFields[1]->id);
        $this->assertEquals('Another Custom Field', $customFields[1]->name);
    }

    public function test_it_can_get_a_custom_field(): void
    {
        $customField = $this->client->customFields()->get('123456789');

        $this->assertInstanceOf(CustomField::class, $customField);
        $this->assertEquals('123456789', $customField->id);
        $this->assertEquals('Test Custom Field', $customField->name);
        $this->assertEquals('sales_invoice', $customField->source);
    }
}
