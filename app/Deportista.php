<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deportista extends Model
{

    protected $table = 'deportista';
	protected $primaryKey = 'Id_Deportista';
	protected $fillable = ['Id_Persona','Tipo_Deportista','Departamento', 'Eps', 'Situacion_Militar', 'Direccion_Residencia', 'Estrato', 'Barrio', 'Localidad', 'Telefono_Fijo', 'Telefono_Celular', 'Correo_Ectronico', 'Tipo_Sangre','Estado_Civil','Hijos','Banco','Cuenta','Agrupacion','Deporte','Modalidad','Etapa'];
	protected $connection = '';
	public $timestamps = true;


	public function __construct()
	{
		$this->connection = config('connections.db_deportes');
	}

	public function persona(){
		$this->hasOne('App\Persona','Id_Persona','Id_Persona');
	}


}
