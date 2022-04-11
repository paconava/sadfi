<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $connection = 'mysql';
    protected $table = 'divisiones';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'siglas'
    ];
}