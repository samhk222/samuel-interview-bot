<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramFile;

class AttachResumeNotification extends BaseNotification
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
            ->content("My resume")
            ->file(Storage::disk('local')->path("documents/resume-samuel-aiala-ferreira.pdf"), 'document');

        return $this->messageWithDefaultButtons($telegram_message);
    }
}
