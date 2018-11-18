<?php

namespace Gestion\models;

use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
   //
    protected $table='difficulties';
    protected $primaryKey='id';

    public $timestamps = false;


    protected $fillable =[
        'nombre',
    ];

    protected $guarded =[
    ];
}
