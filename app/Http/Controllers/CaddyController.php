<?php

namespace App\Http\Controllers;

use Domain\Telegram\Actions\ParseBody;
use Domain\Webhook\SaveRequestLog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Notification;

class CaddyController extends BaseController
{
    public function check(Request $request)
    {
        $authorizedDomains = [
            'laravel.test',
            'www.laravel.test',
        ];

        if (in_array($request->query('domain'), $authorizedDomains)) {
            return response('Domain Authorized');
        }

        // Abort if there's no 200 response returned above
        abort(503);
    }
}
