<?php

namespace Gestion\models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $table='uploads';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id_usuario',
        'aprobado',
        'ruta',
        'titulo',
        'descripcion',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
        'tipo_archivo',
    ];

    protected $guarded =[
    ];

}
