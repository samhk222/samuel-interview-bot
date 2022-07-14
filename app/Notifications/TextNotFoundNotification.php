<?php

namespace App\Notifications;

use Domain\Telegram\Parsers\Text;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class TextNotFoundNotification extends BaseNotification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(stdClass $body)
    {
        parent::__construct($body);
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content("Hey, i didn't find *" . (new Text($this->body))() . "* endpoint");
    }
}
