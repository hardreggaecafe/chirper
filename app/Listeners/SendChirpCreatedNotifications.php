<?php

namespace App\Listeners;

use App\Events\ChirpCreated;
use App\Models\User;
use App\Notifications\NewChirp;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChirpCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
        logger('listener', ['foo' => 'bar']);
    }

    /**
     * Handle the event.
     */
    public function handle(ChirpCreated $event): void
    {
      logger('listener handle', ['foo' => $event]);
      foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user){
        $user->notify(new NewChirp($event->chirp));
      }
    }
}
