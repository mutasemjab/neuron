<?php

namespace App\Mail;

use App\Models\Consultation;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ConsultationReceivedConfirmation extends Mailable
{
    public function __construct(public Consultation $consultation)
    {
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'تم استلام طلب الاستشارة الأونلاين | عيادات نيورون',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.consultation_received',
            with: ['consultation' => $this->consultation],
        );
    }
}
