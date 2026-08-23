<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class NewAppointmentNotification extends Mailable
{
    public function __construct(public Appointment $appointment)
    {
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'حجز موعد جديد — ' . $this->appointment->name,
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.new_appointment',
            with: ['appointment' => $this->appointment],
        );
    }
}
