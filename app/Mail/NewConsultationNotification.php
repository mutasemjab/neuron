<?php

namespace App\Mail;

use App\Models\Consultation;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewConsultationNotification extends Mailable
{
    public function __construct(public Consultation $consultation)
    {
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'طلب استشارة أونلاين جديد — ' . $this->consultation->name,
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.new_consultation',
            with: ['consultation' => $this->consultation],
        );
    }
}
