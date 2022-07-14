<?php

namespace App\Notifications;

use Domain\Telegram\Constants\TextConstants;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class WelcomeNotification extends BaseNotification
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
            ->content('Olá, me chamo Samuel, tenho 40 anos, sou programador web a 20 e sou de [Belo Horizonte](https://pt.wikipedia.org/wiki/Belo_Horizonte) , Brasil')
            ->buttonWithCallback('Quem sou eu', \json_encode(["action" => 'who-am-i']))
            ->buttonWithCallback('My skills', \json_encode(["action" => TextConstants::get("SKILLS")]))
            ->buttonWithCallback('When can you start ?',
                \json_encode(["action" => TextConstants::get("AVAILABILITY")]))
            ->buttonWithCallback('How cool is this bot ? Please vote!',
                \json_encode(["action" => TextConstants::get("HOW_COOL_IS_THAT")]))
            ->buttonWithCallback('Bot statistics',
                \json_encode(["action" => TextConstants::get("STATISTICS")]));
    }
}
