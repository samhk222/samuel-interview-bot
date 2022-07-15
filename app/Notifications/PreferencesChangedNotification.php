<?php

namespace App\Notifications;

use App\Models\User;
use Domain\Telegram\Parsers\UserId;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class PreferencesChangedNotification extends BaseNotification
{
    private User $user;

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
            ->content($this->defineUser()->defineMessage());
    }

    private function defineMessage()
    {
        $show_desc = $this->user->show_menus ? "No" : "Yes";
        return <<<EOL
↙️ Preferences
{$this->HR}
We just updated your preference to *[{$show_desc}]*
EOL;
    }

    private function defineUser()
    {
        $this->user = User::findByTelegramId((new UserId($this->body->body))());

        return $this;
    }
}
