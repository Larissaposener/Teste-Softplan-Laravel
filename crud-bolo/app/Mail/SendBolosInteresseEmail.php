<?php

namespace App\Mail;

use App\Models\Interessado;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendBolosInteresseEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $interessado;
    public $bolos;


    /**
     * Create a new message instance.
     */
    public function __construct($interessado,  $bolos)
    {
        $this->interessado = $interessado;
        $this->bolos = $bolos;
    }
/**
     * Construção do e-mail.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->view('emails.sendBolosInteresseHtmlEmail')
                    ->with([
                        'userName' => $this->interessado->nome,
                        'bolos' => $this->bolos, 
                    ]);
    }
   
}
