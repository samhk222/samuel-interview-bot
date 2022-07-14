<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramFile;

class EnglishLevelRecordingNotification extends BaseNotification
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
            ->content('Brief introduction') // Optional Caption
            ->audio(Storage::disk('local')->path("recordings/introduction.mp3"));
    }
}
