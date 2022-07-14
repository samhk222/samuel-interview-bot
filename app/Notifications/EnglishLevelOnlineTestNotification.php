<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramFile;

class EnglishLevelOnlineTestNotification extends BaseNotification
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
        return TelegramFile::create()
            ->content("**Picture 01** online english test")
            ->file(Storage::disk('local')->path("pictures/online-english-test.png"), 'photo');
    }
}
