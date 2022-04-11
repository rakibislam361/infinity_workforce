<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            
            $table->string('type')->comment('1=image,2=visa,3=resume,4=clearance,5=medical_certificate,6=d_license,7=passport,8=other');
            $table->string('file')->nullable();

           /* $table->string('visa')->nullable();
            $table->string('resume')->nullable();
            $table->string('clearance')->nullable();
            $table->string('medical_certificate')->nullable();
            $table->string('d_license')->nullable();
            $table->string('passport')->nullable();
            $table->string('other')->nullable();*/
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
        Schema::dropIfExists('user_documents');
    }
}
