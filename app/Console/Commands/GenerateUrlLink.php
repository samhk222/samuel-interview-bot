<?php

namespace App\Console\Commands;

use Domain\Telegram\Actions\GenerateEndpointUrl;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GenerateUrlLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram-endpoint-url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the endpoint url';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ngrok_url = $this->ask("Paste the ngrok url here");
        $url = (new GenerateEndpointUrl($ngrok_url))();

        $setting_url = Http::get($url)->json();

        $this->info(\sprintf("%s: %s", "url", $url));
        $this->info(\sprintf("%s: %s", "result", $setting_url['result']));
        $this->info(\sprintf("%s: %s", "description", $setting_url['description']));
    }
}
