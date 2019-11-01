<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    protected $connection = 'sadfi';
    protected $table = 'c_sociodemografico';
	public $timestamps = false;
	protected $primaryKey = 'id';
	protected $fillable = [
			'es_pregunta',
			'es_respuesta',
			'valor',
			'texto',
			'id_padre'
	];
}
