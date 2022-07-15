<?php

namespace Domain\Telegram\Constants;

use Exception;

class TextConstants
{
    const CONSTANTS = [
        "START" => "/start",
        "BACK" => "back-to-menu",
        "PREFERENCES" => "/preferences",
        'SKILLS' => 'my-skills',
        'WHO-AM-I' => 'who-am-i',
        'BELO-HORIZONTE' => 'belo-horizonte',
        'CAN-YOU-WORK-REMOTELY' => 'can-you-work-remotely',
        'CONTACT_INFORMATION' => 'contact',
        'ENGLISH-LEVEL' => 'english-level',
        'CAN-YOU-SHOW-ME' => 'can-you-show-me',
        'AVAILABILITY' => 'availability',
        'STATISTICS' => 'statistics',
        'HOW_COOL_IS_THAT' => 'how-cool-is-that',
        'POLL_VOTE' => 'poll-vote',
        'RESUME' => 'resume',
        'TOGGLE-BUTTON-OPTIONS' => 'toggle-button-options',
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
