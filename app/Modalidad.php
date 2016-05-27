<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    //
    protected $table = 'modalidad';
	protected $primaryKey = 'Id_Modalidad';
	protected $fillable = ['Nombre_Modalidad'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		//$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Modalidad');
	}
}
