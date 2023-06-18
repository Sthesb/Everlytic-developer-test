<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_listings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('position');
            $table->timestamps();
        });

        DB::table('user_listings')->insert([
            [
                'name' => 'John', 
                'surname' => 'Doe',
                'email' => 'johndoe@example.com',
                'position' => 'PHP Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane',
                'surname' => 'Smith',
                'email' => 'janesmith@example.com',
                'position' => 'HR Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_listings');
    }
}
