<?php

namespace App\Notifications\Commands;

use App\Models\User;
use App\Notifications\BaseNotification;
use Domain\Telegram\Constants\TextConstants;
use Domain\Telegram\Parsers\UserId;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class PreferencesNotification extends BaseNotification
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
        return TelegramMessage::create()
            ->content($this->defineContent())
            ->buttonWithCallback('Toggle show menu buttons after every notification',
                \json_encode(["action" => TextConstants::get("TOGGLE-BUTTON-OPTIONS")]));
    }

    private function defineContent()
    {
        return <<<EOL
↗️ Preferences
{$this->HR}
Please choose one of the following options
EOL;
    }
}
