<?php


namespace Domain\Telegram\Actions;


use Domain\Telegram\Parsers\NotificationClass;
use Domain\Telegram\Parsers\UserId;
use Domain\Telegram\Parsers\Text;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Fluent;

class ParseBody
{
    public $request;

    /**
     * ParseBody constructor.
     * @param Request|null $request
     */
    public function __construct(?Request $request)
    {
        $this->request = $request;
    }

    public function __invoke()
    {
        try {
            $body = \json_decode($this->request->getContent());

            return new Fluent([
                'id' => (new UserId($body))(),
                'text' => (new Text($body))(),
                'notifications' => (new NotificationClass($body))(),
                'body' => $body,
            ]);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
