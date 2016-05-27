<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Sangre extends Model
{
    //
    protected $table = 'tipo_sangre';
	protected $primaryKey = 'Id_Tipo_Sangre';
	protected $fillable = ['Nombre_Tipo_Sangre'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		//$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Tipo_Sangre');
	}
}
