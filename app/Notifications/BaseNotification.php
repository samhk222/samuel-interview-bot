<?php

namespace App\Notifications;

use App\Models\EndpointCalls;
use Domain\Telegram\Parsers\MessageId;
use Domain\Telegram\Parsers\Text;
use Domain\Telegram\Parsers\UserId;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class BaseNotification extends Notification
{
    use Queueable;

    protected Fluent $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Fluent $body)
    {
        $this->body = $body;
        $this->saveLog($body);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['telegram'];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->content('adasdsd *video* notification!');
    }

    protected function saveLog(Fluent $body)
    {
        EndpointCalls::create([
            'endpoint' => (new Text($body->body))(),
            'user_id' => (new UserId($body->body))(),
            'message_id' => (new MessageId($body->body))(),
            'uuid' => $body->uuid,
        ]);
    }
}
