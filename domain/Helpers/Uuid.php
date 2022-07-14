<?php


namespace Domain\Helpers;

use Illuminate\Support\Str;

class Uuid
{
    /**
     * @return string
     */
    public function __invoke()
    {
        return (string)Str::uuid();
    }
}
