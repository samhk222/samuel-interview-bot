<?php

namespace Domain\Telegram\Parsers;

use stdClass;

class MessageId
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

    public function __invoke(): string
    {
        return property_exists($this->body, 'callback_query')
            ? $this->body->callback_query->message->message_id
            : (property_exists($this->body, 'message')
                ? $this->body->message->message_id
                : $this->body->poll->id);
    }
}
