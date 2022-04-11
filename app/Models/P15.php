<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P15 extends Model
{
    protected $connection = 'mysql';
    protected $table = 'p15';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'depto_id',
        'division_id',
        'asig_id',
        'p15',
        'p15_just'
    ];
}
