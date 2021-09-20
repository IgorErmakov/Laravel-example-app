<?php

namespace App\Listeners;

use App\Events\AddTodoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddTodoNotification implements ShouldQueue
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
     * @param  AddTodoEvent  $event
     * @return void
     */
    public function handle(AddTodoEvent $event)
    {
        // Just Write to action logs
        info('[ACTION] New todo item added: ', $event->todo->toArray());
    }
}
