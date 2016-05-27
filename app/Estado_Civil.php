<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Civil extends Model
{
    //
    protected $table = 'estado_civil';
	protected $primaryKey = 'Id_Estado_civil';
	protected $fillable = ['Nombre_Estado_Civil'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Estado_civil');
	}

}
