<?php

namespace App\Listeners;

use App\Events\CreateNewBook;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreUserTotalBook
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
        $user->total_book = $user->books()->count();
        $user->save();
    }
}
