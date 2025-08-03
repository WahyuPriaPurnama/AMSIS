<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

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
        $viewName = $this->mailData['type'] === 'birthday' ? 'emails.birthday' : 'emails.reminder';

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
