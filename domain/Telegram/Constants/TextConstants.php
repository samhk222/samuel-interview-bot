<?php

namespace Domain\Telegram\Constants;

use Exception;

class TextConstants
{
    const CONSTANTS = [
        "START" => "/start",
        'SKILLS' => 'my-skills',
        'AVAILABILITY' => 'availability',
        'STATISTICS' => 'statistics',
        'HOW_COOL_IS_THAT' => 'how-cool-is-that'
    ];

    public static function get(string $which)
    {
        try {
            return self::CONSTANTS[$which];
        } catch (Exception $e) {
            throw new Exception(\sprintf("%s not found", $which));
        }
    }
}
