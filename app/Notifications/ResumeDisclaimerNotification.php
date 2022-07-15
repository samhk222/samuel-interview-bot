<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class ResumeDisclaimerNotification extends BaseNotification
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
            ->content($this->defineContent());
    }

    private function defineContent()
    {
        return <<<EOL
📨 Resume
{$this->HR}
If you prefer an printed version of my resume, you can download it below. 
EOL;
    }
}
