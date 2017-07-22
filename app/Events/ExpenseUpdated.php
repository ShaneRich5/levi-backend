<?php

namespace App\Events;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ExpenseUpdated extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $expense;
    public $user;
    public $attribute;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Expense $expense, User $user, $attribute)
    {
        $this->expense = $expense;
        $this->user = $user;
        $this->attribute = $attribute;
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
