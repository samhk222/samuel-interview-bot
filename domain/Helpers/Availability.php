<?php

namespace Domain\Helpers;

use Carbon\Carbon;

class Availability
{
    public function __invoke()
    {
        return Carbon::now()->addWeeks(2);
    }
}
