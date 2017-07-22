<?php

namespace App\Events;

use App\Models\User;
use App\Models\ChurchReport;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChurchReportUpdated extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $churchReport;
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChurchReport $churchReport, User $user)
    {
        $this->churchReport = $churchReport->toArray();
        $this->churchReport['total'] = $churchReport->sources->sum('amount');
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return ['levi-notifications'];
    }
}
