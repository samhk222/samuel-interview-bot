<?php

namespace App\Notifications;

use Domain\Telegram\Constants\TextConstants;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class MySkillsNotification extends BaseNotification
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
*During these 20 years of programming for the web I acquired a vast knowledge in several programming languages, servers, deploys, and tools. Only the most relevant ones are being listed*

*💻 Programing skills*
{$this->HR}
- PHP 8 {$this->stars(5)}
- Laravel {$this->stars(5)}
- docker {$this->stars(5)}
- tdd {$this->stars(4)}
- Vuejs {$this->stars(4)}
- git {$this->stars(4)}
- css {$this->stars(3)}
- aws {$this->stars(2)}

*📦 Databases*
{$this->HR}
- mysql {$this->stars(5)}
- postgresql {$this->stars(3)}
- mongodb {$this->stars(3)}
- db2 {$this->stars(5)}
EOL;
    }

    private function stars(int $times)
    {
        return \str_repeat('⭐', $times);
    }
}
