<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eps extends Model
{
    //
    protected $table = 'eps';
	protected $primaryKey = 'Id_Eps';
	protected $fillable = ['Nombre_Eps'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Eps');
	}
}
