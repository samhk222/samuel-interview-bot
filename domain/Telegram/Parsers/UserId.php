<?php

namespace Domain\Telegram\Parsers;

use stdClass;

class UserId
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
        if (property_exists($this->body, 'callback_query')) {
            return $this->body->callback_query->from->id;
        }

        if (property_exists($this->body, 'message')) {
            return $this->body->message->from->id;
        }

        if (property_exists($this->body, 'poll')) {
            return $this->body->poll->id;
        }
    }
}
