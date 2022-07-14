<?php

namespace App\Notifications;

use App\Models\EndpointCalls;
use Domain\Telegram\Parsers\MessageId;
use Domain\Telegram\Parsers\Text;
use Domain\Telegram\Parsers\UserId;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;
use stdClass;

class BaseNotification extends Notification
{
    use Queueable;

    protected stdClass $body;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(stdClass $body)
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

    protected function saveLog(stdClass $body)
    {
        EndpointCalls::create([
            'endpoint' => (new Text($body))(),
            'user_id' => (new UserId($body))(),
            'message_id' => (new MessageId($body))()
        ]);
    }
}
