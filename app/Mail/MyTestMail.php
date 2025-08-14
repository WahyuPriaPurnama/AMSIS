<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $employee;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData, $employee = null)
    {
        $this->mailData = $mailData;
        $this->employee = $employee;

        if (!$employee) {
            Log::warning('Employee tidak tersedia saat membuat MyTestMail.', [
                'mailData' => $mailData,
            ]);
        }
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'AMS Information Systems',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $type = $this->mailData['type'] ?? null;

        if ($type === 'birthday') {
            $viewName = 'emails.birthday';
        } elseif ($type === 'reminder') {
            $viewName = 'emails.reminder';
        } elseif ($type === 'vehicle') {
            $viewName = 'emails.vehicle';
        } else {
            Log::warning('Tipe email tidak dikenali atau tidak diset.', [
                'mailData' => $this->mailData,
            ]);
            $viewName = 'emails.default'; // fallback view jika tersedia
        }

        return new Content(
            view: $viewName,
            with: [
                'mailData' => $this->mailData,
                'employee' => $this->employee,
            ]
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
