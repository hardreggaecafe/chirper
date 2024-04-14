<?php

namespace App\Events;

use App\Models\Chirp;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChirpCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chirp;
    /**
     * Create a new event instance.
     */
    public function __construct(public Chirp $_chirp)
    {
      logger('event', ['foo' => $_chirp]);
      $this->chirp = $_chirp;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        logger('event', ['foo' => 'broadcastOn']);
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
