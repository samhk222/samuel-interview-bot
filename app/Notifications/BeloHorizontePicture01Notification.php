<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramFile;

class BeloHorizontePicture01Notification extends BaseNotification
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
            ->content("*Picture 01* of Belo Horizonte")
            ->file(Storage::disk('local')->path("pictures/bh01.jpg"), 'photo');
    }
}
