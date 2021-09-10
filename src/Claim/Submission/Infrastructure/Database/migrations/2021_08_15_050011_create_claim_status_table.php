<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Claim\Submission\Domain\Models\ClaimStatus;

class CreateClaimStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claim_status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('code');
        });

        ClaimStatus::create([
            'id' => 1,
            'name' => 'Pending Review',
            'slug' => 'pending_review',
            'code' => 'PENDING_REVIEW'
        ]);
    
        ClaimStatus::create([
            'id' => 2,
            'name' => 'Reviewer Approved',
            'slug' => 'reviewer_approved',
            'code' => 'REVIEWER_APPROVED'
        ]);
    
        ClaimStatus::create([
            'id' => 3,
            'name' => 'Correction Needed',
            'slug' => 'correction_needed',
            'code' => 'CORRECTION_NEEDED'
        ]);
    
        ClaimStatus::create([
            'id' => 4,
            'name' => 'Biller Correction Needed',
            'slug' => 'biller_correction_needed',
            'code' => 'BILLER_CORRECTION_NEEDED'
        ]);
    
        ClaimStatus::create([
            'id' => 5,
            'name' => 'Biller Approved',
            'slug' => 'biller_approved',
            'code' => 'BILLER_APPROVED'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_statuses');
    }
}
