<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $connection = 'mysql';
    protected $table = 'asignaturas';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
            'id',
            'depto_id',
            'nombre',
    ];
}
