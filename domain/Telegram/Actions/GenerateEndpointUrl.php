<?php

namespace Domain\Telegram\Actions;

class GenerateEndpointUrl
{
    private string $ngrok_url;

    /**
     * GenerateEndpointUrl constructor.
     * @param string $ngrok_url
     */
    public function __construct(string $ngrok_url)
    {
        $this->ngrok_url = $ngrok_url;
    }

    public function __invoke()
    {
        return sprintf(
            "https://api.telegram.org/bot%s/setWebhook?url=%s/api/telegram/webhook",
            config('services.telegram-bot-api.token'),
            $this->ngrok_url
        );
    }
}
