<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $connection = 'mysql';
    protected $table = 'departamentos';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'division_id',
        'nombre'
    ];
}
