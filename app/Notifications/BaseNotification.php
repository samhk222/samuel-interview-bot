<?php

namespace App\Notifications;

use App\Models\EndpointCalls;
use App\Models\User;
use Domain\Telegram\Constants\TextConstants;
use Domain\Telegram\Parsers\MessageId;
use Domain\Telegram\Parsers\Text;
use Domain\Telegram\Parsers\UserId;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Fluent;
use NotificationChannels\Telegram\TelegramMessage;

class BaseNotification extends Notification
{
    use Queueable;

    protected Fluent $body;

    protected $HR = "=================================";

    protected string $user_id;

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

    protected function saveLog(Fluent $body)
    {
        $this->user_id = (new UserId($body->body))();

        EndpointCalls::create([
            'endpoint' => (new Text($body->body))(),
            'user_id' => $this->user_id,
            'message_id' => (new MessageId($body->body))(),
            'uuid' => $body->uuid,
        ]);
    }

    public function getBody(): Fluent
    {
        return $this->body;
    }

    protected function messageWithDefaultButtons($message)
    {
        $user = User::findByTelegramId($this->user_id);

        if ($user) {
            if ($user->show_menus != 1 && \get_class($this) !== WelcomeNotification::class) {
                return $message->buttonWithCallback('Back',
                    \json_encode(["action" => TextConstants::get("START")]));
            }
        }

        return $message
            ->buttonWithCallback('Who am i ?', \json_encode(["action" => TextConstants::get("WHO-AM-I")]))
            ->buttonWithCallback('Where do i live  ?', \json_encode(["action" => TextConstants::get("BELO-HORIZONTE")]))
            ->buttonWithCallback('Can you work remotely  ?',
                \json_encode(["action" => TextConstants::get("CAN-YOU-WORK-REMOTELY")]))
            ->buttonWithCallback('How is your English level ?',
                \json_encode(["action" => TextConstants::get("ENGLISH-LEVEL")]))
            ->buttonWithCallback('My skills', \json_encode(["action" => TextConstants::get("SKILLS")]))
            ->buttonWithCallback('Can you show me some work ?',
                \json_encode(["action" => TextConstants::get("CAN-YOU-SHOW-ME")]))
            ->buttonWithCallback('When can you start ?',
                \json_encode(["action" => TextConstants::get("AVAILABILITY")]))
            ->buttonWithCallback('Printed resume',
                \json_encode(["action" => TextConstants::get("RESUME")]))
            ->buttonWithCallback('How cool is this bot ? Please vote!',
                \json_encode(["action" => TextConstants::get("HOW_COOL_IS_THAT")]))
            ->buttonWithCallback('How can i contact you ?',
                \json_encode(["action" => TextConstants::get("CONTACT_INFORMATION")]))
            ->buttonWithCallback('Bot statistics',
                \json_encode(["action" => TextConstants::get("STATISTICS")]));
    }
}
