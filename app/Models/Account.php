<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use App\Events\MoneySubtracted;
use App\Events\MoneyAdded;
use App\Events\AccountDeleted;
use App\Events\AccountCreated;

class Account extends Model
{
    protected $guarded = [];

    public static function createWithAttributes(array $attributes): Account
    {
        /*
         * Let's generate a uuid.
         */
        $attributes['uuid'] = (string) Uuid::uuid4();

        /*
         * The account will be created inside this event using the generated uuid.
         */
        event(new AccountCreated($attributes));

        /*
         * The uuid will be used the retrieve the created account.
         */
        return static::uuid($attributes['uuid']);
    }

    public function addMoney(int $amount)
    {
        event(new MoneyAdded($this->uuid, $amount));
    }

    public function subtractMoney(int $amount)
    {
        event(new MoneySubtracted($this->uuid, $amount));
    }

    public function remove()
    {
        event(new AccountDeleted($this->uuid));
    }

    /*
     * A helper method to quickly retrieve an account by uuid.
     */
    public static function uuid(string $uuid): ?Account
    {
        return static::where('uuid', $uuid)->first();
    }
}
