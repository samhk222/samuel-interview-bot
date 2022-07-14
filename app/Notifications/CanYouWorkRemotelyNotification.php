<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class CanYouWorkRemotelyNotification extends BaseNotification
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
            ->content($this->defineClass());

        return $this->messageWithDefaultButtons($telegram_message);
    }

    private function defineClass()
    {
        return <<<EOL
🏠 Home Office
{$this->HR}
Yes, and I even prefer it!

I've been working from home for **5 years**, and the company I work for is in another city (600 km away from each other). We only had one face-to-face meeting, and only for the team, which is also remote, to get to know each other.

It is a type of work that I particularly enjoy, due to my commitment and ability to deliver what is asked of me.
EOL;
    }
}
