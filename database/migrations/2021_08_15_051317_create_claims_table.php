<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Practice;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('practice_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('progress_note_id');
            //define foreign keys:
            $table->foreign('practice_id')
                ->references('id')
    			->on('practices');
            $table->foreign('provider_id')
                ->references('id')
                ->on('providers');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');
            $table->foreign('progress_note_id')
                ->references('id')
                ->on('progress_notes');
            $table->foreign('status_id')
                ->references('id')
                ->on('claim_status');
            $table->datetime('date_of_service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
