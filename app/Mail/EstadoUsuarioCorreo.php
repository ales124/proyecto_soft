<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstadoUsuarioCorreo extends Mailable
{
    use Queueable, SerializesModels;


    public $subject="Notificacion de Solicitud";
    public $usuario;
    public $solicitud;
    public $mensaje;




    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario,$solicitud,$estado,$mensaje)
    {
        $this->usuario=$usuario;
        $this->solicitud=$solicitud;
        $this->estado=$estado;
        $this->mensaje=$mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        if($this->estado==1){

            return $this->view('emails.aceptar');
        }
        if($this->estado==2){

            return $this->view('emails.aceptar2');
        }
        if($this->estado==3){

            return $this->view('emails.rechazar');
        }




    }
}
