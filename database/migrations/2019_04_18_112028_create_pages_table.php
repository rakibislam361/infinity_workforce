<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->uniqe();
            $table->string('banner')->nullable();
            $table->text('desc')->nullable();
            $table->boolean('status')->default(0);
            // seos
            $table->text('keywords')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('og_url')->nullable();
            $table->text('og_image')->nullable();
            
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
        Schema::dropIfExists('pages');
    }
}
