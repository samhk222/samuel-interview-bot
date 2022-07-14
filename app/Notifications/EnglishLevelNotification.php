<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class EnglishLevelNotification extends BaseNotification
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
            ->content($this->defineContent());

        return $this->messageWithDefaultButtons($telegram_message);
    }

    private function defineContent()
    {
        return <<<EOL
💬 English level
{$this->HR}
I finished an online English test last month, where I scored **89%**.

I am available for tests, video calls, voice calls, etc.

I am also attaching an excerpt where I introduce myself
EOL;
    }
}
