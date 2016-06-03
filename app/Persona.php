<?php

namespace App;

use Idrd\Usuarios\Repo\Persona as MPersona;

class Persona extends MPersona
{
	public function deportista(){

		$this->belongsTo('App\Deportista');

	}
}
