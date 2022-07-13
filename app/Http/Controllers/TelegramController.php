<?php

namespace App\Http\Controllers;

use Domain\Telegram\Actions\ParseBody;
use Domain\Webhook\SaveRequestLog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Notification;

class TelegramController extends BaseController
{
    /**
     * @param Request $request
     * @throws \Exception
     */
    function webhook(Request $request)
    {
        (new SaveRequestLog)($request);

        $body = (new ParseBody($request))();

        collect($body->notifications)->each(function ($notification) use ($body) {
            $class = (new $notification($body->body));
            Notification::route('telegram', $body->id)->notify($class);
        });
    }
}
