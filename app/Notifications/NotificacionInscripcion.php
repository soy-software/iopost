<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionInscripcion extends Notification implements ShouldQueue
{
    use Queueable;
    protected $inscripcion;
    protected $password;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($insc,$passw)
    {
        $this->inscripcion=$insc;
        $this->password=$passw;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url=route('subirComprobantePago',$this->inscripcion->id);
        
        return (new MailMessage)
            ->greeting('Hola! '.$this->inscripcion->user->nombres.' '.$this->inscripcion->user->apellidos)
            ->subject('REGISTRO GENERADO EXITOSAMENTE EN '.$this->inscripcion->corte->maestria->nombre)
            ->line('Sus credenciales para ingresar al sistema son:')
            ->line('Email: '.$this->inscripcion->user->email)
            ->line('Contraseña: '.$this->password)
            ->line('Recuerde cambiar la contraseña en perfil de usuario.')
            ->action('SUBIR COMPROBANTE DE REGISTRO', $url)
            ->line('Gracias por registrar a nuestro programa de maestría');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
