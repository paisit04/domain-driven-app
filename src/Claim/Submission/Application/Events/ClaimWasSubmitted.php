<?php

namespace Claim\Submission\Domain\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Claim\Submission\Domain\Models\Claim;
use App\Events\Event;
use App\Common\Domain\Traits\Saveable;
use App\Common\Domain\Events\SaveDomainEvent;

class ClaimWasSubmitted extends DomainEvent implements ShouldBroadcast
{
    use SerializesModels, Saveable;

    public $claim;

    public $user;

    /**
     * Create Event
     */
    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
        $this->user = $user;
        $this->entity = $claim;
    }

    /**
     * Broadcast on channel ‘domain_events’
     */
    public function broadcastOn()
    {
        return ['domain_events'];
    }
}
