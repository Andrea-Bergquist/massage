<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    // Definiere die Variable für die Formulardaten
    public array $formData;

    /**
     * Skapa en ny meddelandeinstans.
     */
    public function __construct(array $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Definiera e-postens ämne och avsändare.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->formData['email'], $this->formData['name']),
            subject: 'Nytt meddelande från kontaktformulär',
        );
    }

    /**
     * Definiera Blade-vyn som ska användas.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact', // Sökväg till din Blade-fil
        );
    }
}
