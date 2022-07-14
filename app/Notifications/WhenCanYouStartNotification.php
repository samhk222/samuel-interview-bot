<?php

namespace App\Notifications;

use Domain\Helpers\Availability;
use Domain\Telegram\Constants\TextConstants;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class WhenCanYouStartNotification extends BaseNotification
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
            ->content($this->defineMessage())
            ->buttonWithCallback('Back', \json_encode(["action" => TextConstants::get("START")]));
    }

    private function defineMessage()
    {
        $availability = (new Availability)()->toDayDateTimeString();

        return "I am currently working, and i wouldn't like to let my current employers down, so I'm asking for two to three weeks to select and train someone to take my place, so, i would be available from **{$availability}**";
    }

}
