<?php

namespace App\Projectors;

use Spatie\EventSourcing\Models\StoredEvent;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use App\Models\TransactionCount;
use App\Events\MoneySubtracted;
use App\Events\MoneyAdded;

class TransactionCountProjector extends Projector
{
    public function onMoneyAdded(MoneyAdded $event)
    {
        $transactionCounter = TransactionCount::firstOrCreate(['account_uuid' => $event->accountUuid]);

        $transactionCounter->count += 1;

        $transactionCounter->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $transactionCounter = TransactionCount::firstOrCreate(['account_uuid' => $event->accountUuid]);

        $transactionCounter->count += 1;

        $transactionCounter->save();
    }
}
