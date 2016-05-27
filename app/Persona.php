<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
	protected $primaryKey = 'Id_Persona';
	protected $fillable = ['Cedula', 'Primer_Apellido', 'Segundo_Apellido', 'Primer_Nombre', 'Segundo_Nombre', 'Fecha_Nacimiento', 'Nombre_Ciudad', 'Id_Pais', 'Id_TipoDocumento', 'Id_Pais', 'Id_Genero', 'Id_Etnia'];
	protected $connection = '';
	public $timestamps = false;

	public function __construct()
	{
		$this->connection = config('usuarios.conexion');
	}

	public function tipoDocumento()
	{
		return $this->belongsTo(config('usuarios.modelo_documento'), 'Id_TipoDocumento');
	}


	public function pais()
	{
		return $this->belongsTo(config('usuarios.modelo_pais'), 'Id_Pais');
	}

	public function genero()
	{
		return $this->belongsTo(config('usuarios.modelo_genero'), 'Id_Genero');
	}

	public function etnia()
	{
		return $this->belongsTo(config('usuarios.modelo_etnia'), 'Id_Etnia');
	}

	public function deportista(){

		$this->belongsTo('App\Deportista');

	}
}
