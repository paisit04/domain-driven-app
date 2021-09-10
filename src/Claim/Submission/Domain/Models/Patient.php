<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Casts\Address;

/**
 *  Patient : A patient
 *  {@property array $attributes
 *	  address varchar(256)
 *	    ...}
*/
class Patient extends Model
{
    use HasFactory;

    protected $casts = [
        'address' => Address::class
    ];
}
