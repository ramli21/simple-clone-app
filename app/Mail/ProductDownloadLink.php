<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ProductDownloadLink extends Mailable
{
    public function __construct(
        public Payment $payment,
        public string $downloadToken
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address'), config('mail.from.name')),
            subject: 'Download Produk Anda - '.$this->payment->product->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.product-download-link',
            with: [
                'payment' => $this->payment,
                'downloadUrl' => route('download.form'),
            ],
        );
    }
}
