<?php

namespace App\Http\Controllers;

use App\Notifications\TestNotification;
use Domain\Webhook\SaveRequestLog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Notification;

class TelegramController extends BaseController
{
    function webhook(Request $request)
    {
        (new SaveRequestLog)($request);

        $body = \json_decode($request->getContent());
        $id = property_exists($body, 'callback_query') ? $body->callback_query->from->id : $body->message->from->id;

        Notification::route('telegram', $id)
            ->notify(new TestNotification());

        var_dump($id);
    }
}
