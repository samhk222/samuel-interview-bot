<?php

namespace Domain\User\Observers;


use App\Models\User;
use App\Models\Webhooks;
use Domain\Telegram\Parsers\UserId;

class Created
{
    public function __construct(Webhooks $webhook)
    {
        /** @var \stdClass $body */
        $body = \json_decode($webhook->body);
        $user_id = (new UserId($body))();

        User::firstOrCreate([
            'user_id' => $user_id
        ], [
            'show_menus' => 1
        ]);
    }
}
