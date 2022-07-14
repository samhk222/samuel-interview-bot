<?php


namespace Domain\Telegram\Actions;


use App\Models\EndpointCalls;
use Illuminate\Support\Facades\Http;

class DeleteMessage
{
    private EndpointCalls $endpoint_call;

    /**
     * DeleteMessage constructor.
     * @param string $endpoint_call
     */
    public function __construct(EndpointCalls $endpoint_call)
    {
        $this->endpoint_call = $endpoint_call;
    }

    public function __invoke()
    {
        \info('url', [$this->defineUrl()]);
        $result = Http::get($this->defineUrl());
    }

    private function defineUrl()
    {
        return \sprintf(
            "https://api.telegram.org/bot%s/deleteMessage?chat_id=%s&message_id=%s",
            config("services.telegram-bot-api.token"),
            $this->endpoint_call->user_id,
            $this->endpoint_call->message_id);
    }
}
