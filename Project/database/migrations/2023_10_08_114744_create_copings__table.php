<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copings', function(Blueprint $table){
            $table->id();
            $table->string('name')->default('');
            $table->string('lastname')->default('');
            $table->string('group')->default('');
            $table->json('results');
            $table->timestamps();
            // php artisan make:migration create_res-suicide_table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('copings');
    }
};
