<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
     //
    protected $table = 'etapa';
	protected $primaryKey = 'Id_Etapa';
	protected $fillable = ['Nombre_Etapa'];
	protected $connection = '';
	public $timestamps = true;

	public function __construct()
	{
	}

	public function deportista()
	{
		return $this->hasMany(config('App\Deportista'), 'Id_Etapa');
	}
}
