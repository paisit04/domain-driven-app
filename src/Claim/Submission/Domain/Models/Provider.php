<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Model
{
    use HasFactory;

    public $table = 'providers';

    protected $fillable = ['fname', 'lname', 'address', 'practice_id', 'npi_number'];

    public function practice()
    {
        return $this->hasOne(Practice::class, 'practice_id', 'id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }

    public function paycodeSheet()
    {
        return $this->hasOne(PaycodeSheet::class);
    }
}
