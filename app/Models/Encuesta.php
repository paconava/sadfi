<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $connection = 'mysql';
    protected $table = 'encuesta';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'encuesta',
        'depto_id',
        'division_id',
        'asig_id',
        'p15',
        'p15_just'
    ];
}
