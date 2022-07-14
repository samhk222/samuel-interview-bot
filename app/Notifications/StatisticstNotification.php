<?php

namespace App\Notifications;

use Domain\Helpers\Availability;
use Domain\Helpers\Statistics;
use Domain\Telegram\Constants\TextConstants;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class StatisticstNotification extends BaseNotification
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
        $statistics = (new Statistics)();

        return <<<EOL
🤖 Statistics
=================================
Total endpoint calls: *{$statistics->total_api_calls}*
How many endpoints this bot has: *{$statistics->total_endpoints}*
How many users used this bot : *{$statistics->total_users_that_used_this_bot}*
EOL;
    }
}
