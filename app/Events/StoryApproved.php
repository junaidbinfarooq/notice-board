<?php

namespace App\Events;

use App\Models\Story;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class StoryApproved implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Story $story)
    {
    }

    public function broadcastOn(): Channel
    {
        return new Channel('stories');
    }

    public function broadcastAs(): string
    {
        return 'story-approved';
    }
}
