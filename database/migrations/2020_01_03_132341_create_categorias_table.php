<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        // Schema::create('categorias', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('orden')->nullable();
        //     $table->json('nombre')->nullable();
        //     $table->json('img')->nullable();
        //     $table->string('slug')->unique()->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
