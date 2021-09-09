<?php

namespace Claim\Submission\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClaimStatus extends Model
{
    use HasFactory;

    const PENDING_REVIEW = 1;
    const REVIEWER_APPROVED = 2;
    const CORRECTION_NEEDED = 3;
    const BILLER_CORRECTION_NEEDED = 4;
    const BILLER_APPROVED = 5;

    public $table = 'claim_status';
    public $timestamps = false;
    protected $fillable = ["id", "name", "slug", "code"];
}
