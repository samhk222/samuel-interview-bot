<?php

namespace App\Notifications;

use Domain\Helpers\Availability;
use Domain\Helpers\Statistics;
use Domain\Telegram\Constants\TextConstants;
use NotificationChannels\Telegram\TelegramMessage;
use NotificationChannels\Telegram\TelegramPoll;
use stdClass;

class HowCoolIsThatNotification extends BaseNotification
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
        return TelegramPoll::create()
            ->question("Hey, how cool is this bot ?")
            ->choices(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'])
            ->buttonWithCallback('Back', \json_encode(["action" => TextConstants::get("START")]));
    }
}
