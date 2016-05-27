<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    //
    protected $table='deporte';
    protected $primaryKey = 'Id_Deporte';
	protected $fillable = ['Nombre_Deporte'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Deporte');
	}
}
