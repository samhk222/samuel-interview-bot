<?php

namespace Domain\Webhook;


use App\Repositories\WebhooksRepository;
use Exception;
use Illuminate\Http\Request;

class SaveRequestLog
{
    public function __invoke(?Request $request)
    {
        $a = 1;
        $a = 1;

        try {
            \App\Models\Webhooks::create([
                'method' => $request->getMethod(),
                'header' => $this->defineHeader($request),
                'body' => $this->defineBody($request),
                'dt_chamada' => now()->format('Y-m-d H:i:s'),
            ]);
        } catch (Exception $exception) {
            \dd($exception->getMessage());
        }
    }

    private function defineHeader(?Request $request)
    {
        return \collect($request->headers->all())->except('cookie')->toJson();
    }

    protected function defineBody(?Request $request)
    {
        if ($this->isJson($request->getContent())) {
            return $request->getContent();
        }

        return \collect($request->all())->except('password')->toJson();
    }

    private function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

}
