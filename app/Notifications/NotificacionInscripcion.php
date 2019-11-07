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
        $url=route('verMiInscripcion',$this->inscripcion->id);
        
        return (new MailMessage)
            ->greeting('Hola! '.$this->inscripcion->user->nombres.' '.$this->inscripcion->user->apellidos)
            ->subject('INSCRIPCIÓN UTC-POSGRADOS')
            ->line('Inscripción registrado exitosamente en '.$this->inscripcion->corte->maestria->nombre)
            ->action('Ver mi inscripción', $url)
            ->line('Gracias por inscribir a nuestro programa de maestría');
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
