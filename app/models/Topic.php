<?php

namespace Gestion\models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    protected $table='topics';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'nombre',
        'numero_tema',
        'descripcion',
        'id_modulo',
        'usuario_creador',
        'usuario_modificador',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];

    public static function topics($id){
        return Topic::where('id_materia','=',$id)
        ->get();
    }
}
