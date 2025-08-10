<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use App\Models\ContactMessage;

class ContactMessageReply extends Mailable
{
    use Queueable, SerializesModels;

    public $messageData;
    public $replyText;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactMessage $messageData, string $replyText)
    {
        $this->messageData = $messageData;
        $this->replyText = $replyText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reply from Azii Jewelers'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_reply',
            with: [
                'messageData' => $this->messageData,
                'replyText' => $this->replyText
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
