<?php

namespace App\Listeners;

use App\Events\CreateNewBook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLastBookNameUser
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
     * @param  CreateNewBook  $event
     * @return void
     */
    public function handle(CreateNewBook $event)
    {
        $user = $event->user;
        $user->update_last_name = $user->books()->update_last_name;
        $user->save();
    }
}
