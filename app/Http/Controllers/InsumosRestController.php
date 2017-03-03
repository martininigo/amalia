<?php

namespace App\Http\Controllers;

use App\Insumo;
use phpDocumentor\Reflection\Types\This;

class InsumosRestController extends Controller {
	
	
	public function index($id = null) {
		if ($id == null) {
			return Insumo::orderBy('id', 'asc')->get();
		} else {
			return $this->show($id);
		}
	}

	public function show($id) {
		return Insumo::find($id);
	}
	public function store(Request $request) {
		$insumo = new Insumo;
	
		$insumo->nombre = $request->input('nombre');
		$insumo->descripcion = $request->input('descripcion');
		$insumo->cantidad = $request->input('cantidad');
		$insumo->precio = $request->input('precio');
		$insumo->save();
	
		return 'Employee record successfully created with id ' . $insumo->id;
	}
}
