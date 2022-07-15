<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ToggleUserPreferencesButtonListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $notification_body = $event->notification->getBody();

        switch ($notification_body->text) {
            case "toggle-button-options":
                $user = User::findByTelegramId($notification_body->id);
                if ($user) {
                    $user->update([
                        'show_menus' => $user->show_menus == 1 ? 0 : 1
                    ]);
                }
                break;
            default:
                break;
        }
    }
}
