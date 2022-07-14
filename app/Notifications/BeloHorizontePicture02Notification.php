<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramFile;

class BeloHorizontePicture02Notification extends BaseNotification
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
        $telegram_message = TelegramFile::create()
            ->content("**Picture 02** of Belo Horizonte")
            ->file(Storage::disk('local')->path("pictures/bh02.jpg"), 'photo');

        return $telegram_message;
    }
}
