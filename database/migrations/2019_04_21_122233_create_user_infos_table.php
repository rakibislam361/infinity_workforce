<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('mid_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('gender')->nullable(); //1,2,3=>male,female,other
            $table->string('town_city')->nullable();
            $table->string('postcode')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('phone')->nullable();
            $table->date('police_check_date')->nullable();
            $table->date('medical_check_date')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('purpose')->nullable();
            $table->string('address')->nullable();
            $table->boolean('eligible_to_work')->nullable();
            $table->string('travel_to_work')->nullable();
            $table->string('license')->nullable();
            $table->string('visa')->nullable();
            $table->date('visa_exp')->nullable();
            $table->string('language')->nullable();
            $table->string('work_per_week')->nullable();
            $table->string('socials')->nullable();
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
        Schema::dropIfExists('user_infos');
    }
}
