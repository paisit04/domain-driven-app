<?php

namespace App\Aggregates;

use Spatie\EventSourcing\AggregateRoots\AggregateRoot;
use App\Exceptions\CouldNotSubtractMoney;
use App\Events\AggMoneySubtracted;
use App\Events\AggMoneyAdded;
use App\Events\AggAccountLimitHit;
use App\Events\AggAccountDeleted;
use App\Events\AggAccountCreated;

class AccountAggregate extends AggregateRoot
{
    private $balance = 0;
    protected $accountLimit = -5000;

    public function createAccount(string $name, string $userId)
    {
        $this->recordThat(new AggAccountCreated($name, $userId));
        
        return $this;
    }

    public function addMoney(int $amount)
    {
        $this->recordThat(new AggMoneyAdded($amount));
        
        return $this;
    }


    public function subtractMoney(int $amount)
    {
        if (! $this->hasSufficientFundsToSubtractAmount($amount)) {
            $this->recordThat(new AggAccountLimitHit());

            $this->persist();

            throw CouldNotSubtractMoney::notEnoughFunds($amount);
        }

        $this->recordThat(new AggMoneySubtracted($amount));
        
        return $this;
    }


    public function deleteAccount()
    {
        $this->recordThat(new AggAccountDeleted());
        
        return $this;
    }

    public function applyAggMoneyAdded(AggMoneyAdded $event)
    {
        $this->balance += $event->amount;
    }

    public function applyAggMoneySubtracted(AggMoneySubtracted $event)
    {
        $this->balance -= $event->amount;
    }

    private function hasSufficientFundsToSubtractAmount(int $amount): bool
    {
        return $this->balance - $amount >= $this->accountLimit;
    }
}
