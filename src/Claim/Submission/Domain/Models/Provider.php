<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *  Provider : A medical doctor
 *  {@property array $attributes
 *	  first_name varchar(50)
 *	  last_name varchar(60)
 *	  npi_number varchar(10)
 *	  practice_id integer(11) not null
 *	  paycode_sheet_id integer(11) not null
 *	    ...}
*/
class Provider extends Model
{
    use HasFactory;

    public $table = 'providers';

    protected $guarded = ['npi_number', 'practice_id'];

    protected $fillable = ['fname', 'lname', 'address'];

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
