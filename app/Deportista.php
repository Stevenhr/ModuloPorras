<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{
    //

    protected $table = 'deportista';
	protected $primaryKey = 'Id_Deportista';
	protected $fillable = ['Cedula', 'Primer_Apellido', 'Segundo_Apellido', 'Primer_Nombre', 'Segundo_Nombre', 'Fecha_Nacimiento', 'Nombre_Ciudad', 'Id_Pais', 'Id_TipoDocumento', 'Id_Pais', 'Id_Genero', 'Id_Etnia'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		$this->connection = config('db_deportes');
	}

}
