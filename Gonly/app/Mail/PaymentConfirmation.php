<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $direccion;
    public $total;

    public function __construct($direccion, $total)
    {
        $this->direccion = $direccion;
        $this->total = $total;
    }

    public function build()
    {
        return $this->subject('Confirmación de Pago')
        ->markdown('testmail');
    }
}
