<?php

namespace App\Notifications;

use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class CanYouShowMeSomeWorkNotification extends BaseNotification
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
👷 Show me some code
{$this->HR}
My repositories are *mostly private*, but I'll share the latest tests I've done

I am also available to take exams or placement tests to show my knowledge. I actually like doing these tests 😊

[This repo](https://github.com/samhk222/samuel-interview-bot)
{$this->HR}
What's the point of doing something cool if you don't share it with anyone? This bot made to show a little about me is open source, and can be found at the link above

[Active House](https://github.com/samhk222/active-housing-reqres)
{$this->HR}
This is the task requested by Active Housing, to full fill the following test, which consists of creating a package that:
- Retrieve a user by ID
- Retrieves a list of users
- Convert results to JSON

[Active House Testing](https://github.com/samhk222/active-housing-testing)
{$this->HR}
You can test the test mentioned above.

[Laravel Arena](https://github.com/samhk222/laravel-arena)
{$this->HR}
Project that involved front and back, for display, registration, test customers, numbers and preferences of the same. Made using vuejs and Laravel

[Cobol as a microservice](https://github.com/samhk222/Cobol-as-Microservice)
{$this->HR}
Just out of curiosity, I have 5 years with mainframe programming (Natural, Cobol, and PL/i). And they are tools to be considered even today in case of absurd amount data to be processed.

This repository proves it 😉

EOL;
    }
}
