<?php

namespace Domain\Telegram\Parsers;

use stdClass;

class Text
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

    public function __invoke(): string|null
    {
        if (property_exists($this->body, 'message')
            && property_exists($this->body->message, 'text')) {
            return $this->body->message->text;
        }

        if (\property_exists($this->body, 'callback_query')
            && \property_exists($this->body->callback_query, 'data')) {
            return \json_decode($this->body->callback_query->data)->action;
        }
    }
}
