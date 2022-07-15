<?php


namespace Domain\User\Actions;


use App\Models\User;

class SwapShowMenusPreferences
{
    public function __construct(private User $user)
    {
    }

    public function __invoke()
    {
        $this->user->update([
            'show_menus' => $this->user->show_menus == 1 ? 0 : 1,
        ]);

        return $this->user->refresh();
    }
}
