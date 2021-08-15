<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    public $table = 'claims';	

	protected $fillable = ['provider_id', 'patient_id', 'progress_note_id', 'date_of_service', 'status_id'];

    //relations:
	public function provider()
	{
		return $this->hasOne(Provider::class);
	}

	public function patient()
	{
		return $this->hasOne(Patient::class);
	}

	public function progressNotes()
	{
		return $this->hasMany(ProviderNote::class);
	}

	public function status()
	{
	     return $this->hasOne(ClaimStatus::class, 'status_id', 'id');
	}
}
