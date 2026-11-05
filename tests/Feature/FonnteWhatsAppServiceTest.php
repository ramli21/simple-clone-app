<?php

namespace Tests\Feature;

use App\Models\Inquiry;
use App\Services\FonnteWhatsAppService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FonnteWhatsAppServiceTest extends TestCase
{
    public function test_it_sends_inquiry_notifications_to_the_configured_admin(): void
    {
        config([
            'services.fonnte.token' => 'test-token',
            'services.fonnte.admin_number' => '08123456789',
            'services.fonnte.country_code' => '62',
        ]);
        Http::fake([
            'https://api.fonnte.com/send' => Http::response(['status' => true], 200),
        ]);

        $inquiry = new Inquiry([
            'name' => 'Dina',
            'email' => 'dina@example.com',
            'whatsapp_number' => '08111111111',
            'subject' => 'Website',
            'message' => 'Mohon informasi pembuatan website.',
        ]);

        $result = app(FonnteWhatsAppService::class)->notifyNewInquiry($inquiry);

        $this->assertTrue($result);
        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.fonnte.com/send'
                && $request->method() === 'POST'
                && $request->hasHeader('Authorization', 'test-token')
                && $request['target'] === '08123456789'
                && $request['countryCode'] === '62'
                && str_contains($request['message'], 'Inquiry baru masuk')
                && str_contains($request['message'], 'Mohon informasi pembuatan website.');
        });
    }

    public function test_it_reports_fonnte_rejections_and_missing_configuration(): void
    {
        config([
            'services.fonnte.token' => 'test-token',
            'services.fonnte.admin_number' => '08123456789',
        ]);
        Http::fake([
            'https://api.fonnte.com/send' => Http::response(['status' => false], 200),
        ]);

        $service = app(FonnteWhatsAppService::class);
        $this->assertFalse($service->sendToAdmin('Test message', 'test'));

        config(['services.fonnte.token' => null]);
        $this->assertFalse($service->sendToAdmin('Test message', 'test'));

        Http::assertSentCount(1);
    }
}
