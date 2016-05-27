<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    //
    protected $table = 'banco';
	protected $primaryKey = 'Id_Banco';
	protected $fillable = ['Nombre_Banco'];
	protected $connection = '';
	public $timestamps = true;

	public function __construct()
	{
		$this->connection = config('connections.db_deportes');
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Banco');
	}

}
