<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class WelcomeNotification extends BaseNotification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Fluent $body)
    {
        parent::__construct($body);
    }

    public function toTelegram($notifiable)
    {
        $telegram_message = TelegramMessage::create()
            ->content('Olá, me chamo Samuel, tenho 40 anos, sou programador web a 20 e sou de [Belo Horizonte](https://pt.wikipedia.org/wiki/Belo_Horizonte) , Brasil');

        return $this->messageWithDefaultButtons($telegram_message);
    }
}
