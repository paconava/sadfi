<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $connection = 'mysql';
    protected $table = 'semestres';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'semestre'
    ];
}
