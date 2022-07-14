<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramContact;
use NotificationChannels\Telegram\TelegramMessage;

class ContactDisclaimerNotification extends BaseNotification
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
            ->content($this->defineContact());
    }

    private function defineContact()
    {
        return <<<EOL
📩 Contact Information
{$this->HR}
**E-mail:** cadastros@samuca.com
**Whatsapp:** +5531984498313
**Telegram:** [https://t.me/samhk222](https://t.me/samhk222)

Or you can click on the card bellow to send me an direct message
EOL;
    }
}
