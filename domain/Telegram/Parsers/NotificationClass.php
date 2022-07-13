<?php

namespace Domain\Telegram\Parsers;

use App\Notifications\TextNotFoundNotification;
use App\Notifications\WelcomeNotification;
use stdClass;

class NotificationClass
{
    private stdClass $body;

    /**
     * UserId constructor.
     * @param stdClass $
     */
    public function __construct(stdClass $body)
    {
        $this->body = $body;
    }

    public function __invoke(): array
    {
        $text = (new Text($this->body))();

        switch ($text) {
            case "/start":
                return [
                    WelcomeNotification::class,
                    WelcomeNotification::class
                ];
            default:
                return [TextNotFoundNotification::class];
        }
    }
}
