<?php

namespace Domain\Helpers;

use App\Models\EndpointCalls;
use Illuminate\Support\Fluent;

class Statistics
{
    public function __invoke(): Fluent
    {
        return new Fluent([
            'total_api_calls' => EndpointCalls::count(),
            'total_endpoints' => EndpointCalls::groupBy('endpoint')->get()->count(),
            'total_users_that_used_this_bot' => EndpointCalls::groupBy('user_id')->get()->count(),
        ]);
    }
}
