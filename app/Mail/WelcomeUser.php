<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
* La presente clase queda pendiente para implementar con Cola y trabajo
* la tabla jobs y failed_jobs, ya estan instalada para uqe usted
* pueda implementar envío de correo a través de cola y mejorar
* la experiencia del Usuario.
* por ejemplo: cuando el usuario se registre o usted cree un usuario
* observara que se tarda para completar la tarea, una vez usted implemente
* la cola de trabajo vera como los tiempo de realizar la tare baja mucho.
*/
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Correo.welcome_user');
    }
}
