<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        return (new MailMessage)
            ->salutation('Atentamente')
//            ->greeting('Hello!')
            ->greeting('Saludos ')
//            ->line('You are receiving this email because we received a password reset request for your account.')
            ->line('Has recibido este correo porque hemos recibido una solicitud de reinicio de contraseña desde tu cuenta.')
//            ->action('Reset Password', url('orgnz/password/reset', $this->token))
            ->action('Reiniciar Contraseña', url('orgnz/password/reset', $this->token))
//            ->line('If you did not request a password reset, no further action is required.');
            ->line('Si no solicitaste un reinicio de contraseña, omitir este mensaje.');

//            ->actionText("Si experimentas problemas al oprimir el botón \":actionText\", copia y pega la siguiente dirección\n".
//                'en tu navegador web: ');


    }
}
