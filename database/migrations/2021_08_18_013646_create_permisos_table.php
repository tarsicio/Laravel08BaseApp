<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('modelos_id');
            $table->unsignedBigInteger('rols_id');
            $table->enum('delete', ['ALLOW','DENY'])->nullable()->default('DENY');
            $table->enum('edit', ['ALLOW','DENY'])->nullable()->default('DENY');
            $table->enum('add', ['ALLOW','DENY'])->nullable()->default('DENY');
            $table->enum('view', ['ALLOW','DENY'])->nullable()->default('DENY');
            $table->timestamps();
            $table->unique(['modelos_id','rols_id','delete','edit','add','view']);            
            $table->foreign('modelos_id')->references('id')->on('modelos');
            $table->foreign('rols_id')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos');
    }
}
