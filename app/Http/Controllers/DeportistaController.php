<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;



class DeportistaController extends Controller
{
    public function datos(){
    	
		$documento = app()->make(config('usuarios.modelo_documento'));
		$paises = app()->make(config('usuarios.modelo_pais'));
		$eps = app()->make(config('usuarios.modelo_eps'));
		$departamento = app()->make(config('usuarios.modelo_departamento'));
		$lista = [
	        'documentos' => $documento->all(),
	        'paises' => $paises->all(),
	        'eps' => $eps->all(),
	        'departamento' => $departamento->all(),
			'status' => session('status')
		];

		return view('deportista', $lista);
	}
}
