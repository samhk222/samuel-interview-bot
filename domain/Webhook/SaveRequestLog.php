<?php

namespace Domain\Webhook;

use App\Models\Webhooks;
use Exception;
use Illuminate\Http\Request;

class SaveRequestLog
{
    public function __invoke(?Request $request)
    {
        try {
            Webhooks::create([
                'method' => $request->getMethod(),
                'header' => $this->defineHeader($request),
                'body' => $this->defineBody($request),
                'dt_chamada' => now()->format('Y-m-d H:i:s'),
                'referer' => '',
                'imported' => 0
            ]);
        } catch (Exception $exception) {
            \dd($exception->getMessage());
        }
    }

    private function defineHeader(?Request $request): string
    {
        return \collect($request->headers->all())->except('cookie')->toJson();
    }

    protected function defineBody(?Request $request): bool|string|null
    {
        if ($this->isJson($request->getContent())) {
            return $request->getContent();
        }

        return \collect($request->all())->except('password')->toJson();
    }

    private function isJson($string): bool
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

}
