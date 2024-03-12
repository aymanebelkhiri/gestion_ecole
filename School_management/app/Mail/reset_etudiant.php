<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reset_etudiant extends Mailable
{
    use Queueable, SerializesModels;

    public $password; // Ajout de la visibilité publique

    /**
     * Create a new message instance.
     * @param string $password
     */
    public function __construct(string $password) // Correction de la syntaxe
    {
        $this->password = $password; // Correction de l'attribution de la valeur
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("belkhiriaymane5@gmail.com")
            ->subject('You Have a new Command !!')
            ->view('emails.email', ['password' => $this->password]); // Accès à la propriété password via $this
    }
}
