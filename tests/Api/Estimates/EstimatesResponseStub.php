<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Estimates;

class EstimatesResponseStub
{
    public static function getAll(): string
    {
        return '[
            {
                "id": "123456789",
                "administration_id": "987654321",
                "contact_id": "456789123",
                "contact": {
                    "id": "456789123",
                    "name": "Test Contact"
                },
                "estimate_id": "EST001",
                "workflow_id": "123",
                "document_style_id": "456",
                "identity_id": "789",
                "state": "draft",
                "estimate_date": "2023-01-01",
                "due_date": "2023-02-01",
                "reference": "Test Estimate",
                "language": "en",
                "currency": "EUR",
                "exchange_rate": "1.0",
                "discount": "0",
                "original_estimate_id": null,
                "show_tax": "true",
                "sign_online": "false",
                "sent_at": null,
                "accepted_at": null,
                "rejected_at": null,
                "archived_at": null,
                "created_at": "2023-01-01T12:00:00.000Z",
                "updated_at": "2023-01-01T12:00:00.000Z",
                "public_view_code": "abc123",
                "version": "1",
                "pre_text": "Pre text",
                "post_text": "Post text",
                "total_price_excl_tax": "100.00",
                "total_price_excl_tax_base": "100.00",
                "total_price_incl_tax": "121.00",
                "total_price_incl_tax_base": "121.00",
                "total_tax": "21.00",
                "total_tax_base": "21.00",
                "prices_are_incl_tax": "true",
                "details": [],
                "custom_fields": [],
                "notes": [],
                "events": []
            },
            {
                "id": "987654321",
                "administration_id": "987654321",
                "contact_id": "123456789",
                "contact": {
                    "id": "123456789",
                    "name": "Another Contact"
                },
                "estimate_id": "EST002",
                "workflow_id": "123",
                "document_style_id": "456",
                "identity_id": "789",
                "state": "draft",
                "estimate_date": "2023-02-01",
                "due_date": "2023-03-01",
                "reference": "Another Estimate",
                "language": "en",
                "currency": "EUR",
                "exchange_rate": "1.0",
                "discount": "0",
                "original_estimate_id": null,
                "show_tax": "true",
                "sign_online": "false",
                "sent_at": null,
                "accepted_at": null,
                "rejected_at": null,
                "archived_at": null,
                "created_at": "2023-02-01T12:00:00.000Z",
                "updated_at": "2023-02-01T12:00:00.000Z",
                "public_view_code": "def456",
                "version": "1",
                "pre_text": "Pre text",
                "post_text": "Post text",
                "total_price_excl_tax": "200.00",
                "total_price_excl_tax_base": "200.00",
                "total_price_incl_tax": "242.00",
                "total_price_incl_tax_base": "242.00",
                "total_tax": "42.00",
                "total_tax_base": "42.00",
                "prices_are_incl_tax": "true",
                "details": [],
                "custom_fields": [],
                "notes": [],
                "events": []
            }
        ]';
    }

    public static function get(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST001",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "draft",
            "estimate_date": "2023-01-01",
            "due_date": "2023-02-01",
            "reference": "Test Estimate",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": null,
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": null,
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-01-01T12:00:00.000Z",
            "public_view_code": "abc123",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "total_tax": "21.00",
            "total_tax_base": "21.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }

    public static function synchronization(): string
    {
        return '[
            {
                "id": "123456789",
                "version": 1
            },
            {
                "id": "987654321",
                "version": 1
            }
        ]';
    }

    public static function create(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST003",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "draft",
            "estimate_date": "2023-03-01",
            "due_date": "2023-04-01",
            "reference": "New Estimate",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": null,
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": null,
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-03-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z",
            "public_view_code": "ghi789",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "300.00",
            "total_price_excl_tax_base": "300.00",
            "total_price_incl_tax": "363.00",
            "total_price_incl_tax_base": "363.00",
            "total_tax": "63.00",
            "total_tax_base": "63.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }

    public static function update(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST001",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "draft",
            "estimate_date": "2023-01-01",
            "due_date": "2023-02-01",
            "reference": "Updated Estimate",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": null,
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": null,
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z",
            "public_view_code": "abc123",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "total_tax": "21.00",
            "total_tax_base": "21.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }

    public static function changeState(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST001",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "open",
            "estimate_date": "2023-01-01",
            "due_date": "2023-02-01",
            "reference": "Test Estimate",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": null,
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": "2023-03-01T12:00:00.000Z",
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z",
            "public_view_code": "abc123",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "total_tax": "21.00",
            "total_tax_base": "21.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }

    public static function sendEmail(): string
    {
        return '{
            "id": "123456789",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST001",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "open",
            "estimate_date": "2023-01-01",
            "due_date": "2023-02-01",
            "reference": "Test Estimate",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": null,
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": "2023-03-01T12:00:00.000Z",
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-01-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z",
            "public_view_code": "abc123",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "total_tax": "21.00",
            "total_tax_base": "21.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }

    public static function getSendEmailTemplate(): string
    {
        return '{
            "email_address": "test@example.com",
            "subject": "Estimate EST001",
            "message": "Please find your estimate attached."
        }';
    }

    public static function duplicate(): string
    {
        return '{
            "id": "987654321",
            "administration_id": "987654321",
            "contact_id": "456789123",
            "contact": {
                "id": "456789123",
                "name": "Test Contact"
            },
            "estimate_id": "EST004",
            "workflow_id": "123",
            "document_style_id": "456",
            "identity_id": "789",
            "state": "draft",
            "estimate_date": "2023-03-01",
            "due_date": "2023-04-01",
            "reference": "Test Estimate (copy)",
            "language": "en",
            "currency": "EUR",
            "exchange_rate": "1.0",
            "discount": "0",
            "original_estimate_id": "123456789",
            "show_tax": "true",
            "sign_online": "false",
            "sent_at": null,
            "accepted_at": null,
            "rejected_at": null,
            "archived_at": null,
            "created_at": "2023-03-01T12:00:00.000Z",
            "updated_at": "2023-03-01T12:00:00.000Z",
            "public_view_code": "jkl012",
            "version": "1",
            "pre_text": "Pre text",
            "post_text": "Post text",
            "total_price_excl_tax": "100.00",
            "total_price_excl_tax_base": "100.00",
            "total_price_incl_tax": "121.00",
            "total_price_incl_tax_base": "121.00",
            "total_tax": "21.00",
            "total_tax_base": "21.00",
            "prices_are_incl_tax": "true",
            "details": [],
            "custom_fields": [],
            "notes": [],
            "events": []
        }';
    }
}
