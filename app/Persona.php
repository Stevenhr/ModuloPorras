<?php

namespace App;

use Idrd\Usuarios\Repo\Persona as MPersonas;


class Persona extends MPersonas
{
 
	public function deportista(){

		$this->belongsTo('App\Deportista');

	}
}
