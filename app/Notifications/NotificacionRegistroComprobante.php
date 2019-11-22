<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificacionRegistroComprobante extends Notification
{
    use Queueable;
    protected $inscripcion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($insc)
    {
        $this->inscripcion=$insc;
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
        $url=route('miPerfil');
        return (new MailMessage)
            ->greeting('Hola! '.$this->inscripcion->user->nombres.' '.$this->inscripcion->user->apellidos)
            ->subject('COMPROBANTE DE REGISTRO')
            ->line('COMPROBANTE DE REGISTRO '.$this->inscripcion->corte->maestria->nombre.' APROBADO EXITOSAMENTE')
            ->line('Por favor, completa le información de:')
            ->line('INFORMACIÓN PERSONAL')
            ->line('INFORMACIÓN ACADÉMICA')
            ->line('INFORMACIÓN LABORAL')
            ->line('En la sigunete url')
            ->action('ACTUALIZAR INFORMACIÓN', $url)
            ->line('Gracias por ser parte de nosotros');
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
