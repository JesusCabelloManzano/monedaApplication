<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonedaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //create table
    {
        Schema::create('moneda', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 60);
            $table->string('simbolo', 3);
            $table->string('pais', 100);
            $table->decimal('valor', 4, 2);
            $table->date('fechacreacion')->nullable();

            $table->timestamps();
            
            $table->unique(['id', 'pais']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //drop table
    {
        Schema::dropIfExists('ticket');
    }
}
