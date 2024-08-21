<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Webhooks;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class WebhooksEndpointTest extends BaseTestCase
{
    /** @test */
    public function testCreateWebhook(): void
    {
        $moneybird = $this->getMoneybirdClientWithMocks([
            CreateWebhookRequest::class => MockResponse::make([
                'id' => '426664308573734088',
                'administration_id' => 123,
                'url' => 'http://www.mocky.io/v2/5185415ba171ea3a00704eed',
                'events' => [],
                'last_http_status' => null,
                'last_http_body' => null,
                'token' => 'kRCPMKEfvK4ukJ6rB1QGGLBB',
            ], 201),
        ]);

        $webhook = $moneybird->webhooks()->create([
            'url' => 'http://www.mocky.io/v2/5185415ba171ea3a00704eed',
        ]);

        $this->assertInstanceOf(Webhook::class, $webhook);
        $this->assertEquals('http://www.mocky.io/v2/5185415ba171ea3a00704eed', $webhook->url);
    }
}
