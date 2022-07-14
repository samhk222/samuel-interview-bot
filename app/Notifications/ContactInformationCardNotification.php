<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramContact;
use NotificationChannels\Telegram\TelegramMessage;

class ContactInformationCardNotification extends BaseNotification
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
        $telegram_message = TelegramContact::create()
            ->firstName('Samuel')
            ->lastName('Ferreira')
            ->phoneNumber('+5531984498313');

        return $this->messageWithDefaultButtons($telegram_message);
    }
}
