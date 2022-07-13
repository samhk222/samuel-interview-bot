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
        return property_exists($this->body, 'message')
        && property_exists($this->body->message, 'text')
            ? $this->body->message->text
            : null;
    }
}
