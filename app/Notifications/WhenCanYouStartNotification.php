<?php

namespace App\Notifications;

use Domain\Helpers\Availability;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class WhenCanYouStartNotification extends BaseNotification
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
            ->content($this->defineMessage());

        return $this->messageWithDefaultButtons($telegram_message);
    }

    private function defineMessage()
    {
        $availability = (new Availability)()->toFormattedDateString();

        return <<<EOL
📆 Availability
{$this->HR}
I'm currently working, and i wouldn't like to let my current employers down, so I'm asking for two to three weeks to interview and train someone to take my place, so, i would be available from *{$availability}*
EOL;
    }

}
