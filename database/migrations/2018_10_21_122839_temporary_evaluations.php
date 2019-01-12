<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemporaryEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('temporaryEvaluations', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
      
            $table->integer('id_tema');
            $table->string('tema');
            $table->integer('id_tipo');
            $table->string('tipo');
            $table->integer('id_evaluacion');
            $table->string('evaluacion');
            $table->integer('id_dificultad');
            $table->string('dificultad');
            $table->integer('cantidad_teorico');
            $table->integer('cantidad_Practico');
            $table->integer('generada');
            $table->string('fecha');
            $table->integer('id_usuario');
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->boolean('impreso')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporaryEvaluations');
    }
}
