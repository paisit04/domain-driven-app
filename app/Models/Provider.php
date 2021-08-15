<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public $table = 'providers';

	protected $fillable = ['fname', 'lname', 'address', 'practice_id', 'npi_number'];

	public function practice()
	{
		return $this->hasOne(Practice::class, 'practice_id', 'id');
	}
}
