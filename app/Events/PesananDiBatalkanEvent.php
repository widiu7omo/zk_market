<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PesananDiBatalkanEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $uri;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param $uri
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
        $this->message = 'Pesanan dibatalkan oleh customer';
    }

    public function shouldDiscoverEvents()
    {
        return true;
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['pesanan'];
    }
    public function broadcastAs()
    {
        return 'pesanan-batal';
    }
}
