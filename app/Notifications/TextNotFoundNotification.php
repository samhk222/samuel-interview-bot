<?php

namespace App\Notifications;

use Domain\Telegram\Parsers\Text;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class TextNotFoundNotification extends BaseNotification
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
            ->content("Hey, i didn't find *" . (new Text($this->body->body))() . "* endpoint");

        return $this->messageWithDefaultButtons($telegram_message);
    }
}
