<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('sun_start')->nullable();
            $table->string('sun_end')->nullable();
            $table->string('mon_start')->nullable();
            $table->string('mon_end')->nullable();
            $table->string('tue_start')->nullable();
            $table->string('tue_end')->nullable();
            $table->string('wed_start')->nullable();
            $table->string('wed_end')->nullable();
            $table->string('thu_start')->nullable();
            $table->string('thu_end')->nullable();
            $table->string('fri_start')->nullable();
            $table->string('fri_end')->nullable();
            $table->string('sat_start')->nullable();
            $table->string('sat_end')->nullable();
            
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
        Schema::dropIfExists('work_abilities');
    }
}
