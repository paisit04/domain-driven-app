<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
			$table->string('slug');
            $table->timestamps();
        });

        Role::create([
            'id'   => Role::ROLE_ADMIN,
            'name' => 'Administrator',
            'slug' => 'admin'
        ]);

        Role::create([
            'id'   => Role::ROLE_PRACTICE,
            'name' => 'Practice',
            'slug' => 'practice'
        ]);

        Role::create([
            'id'   => Role::ROLE_PROVIDER,
            'name' => 'Provider',
            'slug' => 'provider'
        ]);

        Role::create([
            'id'   => Role::ROLE_BILLER,
            'name' => 'Fqhc Biller',
            'slug' => 'fqhc-biller'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
