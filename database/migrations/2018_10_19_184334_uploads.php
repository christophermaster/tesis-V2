<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Uploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->increments('id');//identificador de la tabla
            $table->longText('titulo');
            $table->longText('descripcion');
            $table->integer('id_usuario')->unsigned();//identificador de la facultad que pertenece la escuela
            $table->string('usuario_creador');
            $table->string('usuario_modificador');
            $table->longText('ruta'); //nombre de la Escuela de la universidad de carabobo
            $table->boolean('aprobado')->nullable();
            $table->string('tipo_archivo');
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
        });

        Schema::table('uploads', function($table){
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploads', function($table)
        {
            Schema::dropIfExists('uploads');
            $table->dropForeign('uploads_id_usuario_foreign');
        });
    }
}
