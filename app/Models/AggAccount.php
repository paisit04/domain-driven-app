<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AggAccount extends Model
{
    use HasFactory;

    public $guarded = [];

    public static function uuid(string $uuid): self
    {
        return static::where('uuid', $uuid)->first();
    }

    public function addMoney(int $amount)
    {
        $this->balance += $amount;

        $this->save();

        return;
    }

    public function subtractMoney(int $amount)
    {
        $this->balance -= $amount;

        $this->save();

        return;
    }
}
