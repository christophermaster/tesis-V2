<?php

namespace Gestion\models;
use Illuminate\Database\Eloquent\Model;

class TemporaryEvaluation extends Model
{
    //
    protected $table='temporaryEvaluations';
    protected $primaryKey='id';

    public $timestamps = false;

    protected $fillable =[
        'id',
        'id_dificultad',
        'dificultad',
        'id_tema',
        'tema',
        'id_tipo',
        'tipo',
        'id_evaluacion', 
        'id_evaluacion',
        'cantidad_teorico',
        'cantidad_practico',
        'fecha',
        'id_usuario',
        'usuario_creador',
        'usuario_modificador',
        'impreso',
        'created_at',
        'updated_at',
    ];

    protected $guarded =[
    ];
}
