<?php

namespace Tests\Feature;

use App\Mail\InqueryForwarderMailer;
use App\Models\CompanyProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InquiryNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_inquiries_are_sent_to_the_admin_email_and_whatsapp_number(): void
    {
        config([
            'services.inquiry.admin_email' => 'inquiry-admin@example.com',
            'services.fonnte.token' => 'test-token',
            'services.fonnte.admin_number' => '08123456789',
            'services.fonnte.country_code' => '62',
        ]);
        Mail::fake();
        Http::fake([
            'https://api.fonnte.com/send' => Http::response(['status' => true], 200),
        ]);

        CompanyProfile::query()->create([
            'name' => 'Akhritech',
            'category' => 'manufacturing',
            'email' => 'company-profile@example.com',
        ]);

        $response = $this->postJson(route('inquiry.store'), [
            'name' => 'Dina',
            'email' => 'dina@example.com',
            'whatsapp_number' => '08111111111',
            'subject' => 'Website',
            'message' => 'Mohon informasi pembuatan website.',
        ]);

        $response->assertOk();
        Mail::assertSent(InqueryForwarderMailer::class, function ($mail) {
            return $mail->hasTo('inquiry-admin@example.com');
        });
        Http::assertSent(function ($request) {
            return $request->url() === 'https://api.fonnte.com/send'
                && $request['target'] === '08123456789'
                && str_contains($request['message'], 'Inquiry baru masuk')
                && str_contains($request['message'], 'Dina');
        });
    }
}
