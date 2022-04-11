<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('company_name')->nullabele();
            $table->string('phone')->nullabele();
            $table->string('email')->nullabele();
            $table->string('website')->nullabele();
            $table->string('address')->nullabele();
            $table->string('license')->nullabele();
            $table->string('details')->nullabele();
            $table->date('expire_date')->nullabele();
            $table->string('image')->nullabele();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('employer_infos');
    }
}
