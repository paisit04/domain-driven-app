<?php

namespace App\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use App\Models\AggAccount;
use App\Events\AggMoneySubtracted;
use App\Events\AggMoneyAdded;
use App\Events\AggAccountDeleted;
use App\Events\AggAccountCreated;

class AggAccountProjector extends Projector
{
    public function onAggAccountCreated(AggAccountCreated $event)
    {
        AggAccount::create([
            'uuid' => $event->aggregateRootUuid(),
            'name' => $event->name,
            'user_id' => $event->userId,
        ]);
    }

    public function onAggMoneyAdded(AggMoneyAdded $event)
    {
        $account = AggAccount::uuid($event->aggregateRootUuid());

        $account->balance += $event->amount;

        $account->save();
    }

    public function onAggMoneySubtracted(AggMoneySubtracted $event)
    {
        $account = AggAccount::uuid($event->aggregateRootUuid());

        $account->balance -= $event->amount;

        $account->save();
    }

    public function onAggAccountDeleted(AggAccountDeleted $event)
    {
        AggAccount::uuid($event->aggregateRootUuid())->delete();
    }
}
