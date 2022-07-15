<?php

namespace App\Notifications;

use Domain\User\Actions\SwapShowMenusPreferences;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class WhoAmINotification extends BaseNotification
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
            ->content($this->defineContent());

        return $this->messageWithDefaultButtons($telegram_message);
    }

    private function defineContent()
    {
        return <<<EOL
I'm a fullstack web programmer with 20 years, experience in the telecommunications, construction, and finance sectors, and with an MBA in project management

I have been working for five years as a remote programmer with the Laravel stack + back in a fintech, where I am the only one responsible for the development, maintenance and support of 3 large systems, where I do gather requirements, meeting with the PO's, development, testing e deployments, in another words, all the life cycle of a project. And because it is a fintech, all compliance and integration between various financial institutions.

You can check my resume, at *printed resume* menu, where I summarize a few of my activities
EOL;
    }
}
