<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;


    public $nombre;
    public $telefono;
    public $correo;
    public $mensaje;

    public function __construct()
    {
        $this->nombre = request()->nombre ?? null;
        $this->telefono = request()->telefono ?? null;
        $this->correo = request()->correo ?? null;
        $this->mensaje = request()->mensaje ?? null;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Cliente interesado')
            ->markdown('emails.contact');
    }
}
