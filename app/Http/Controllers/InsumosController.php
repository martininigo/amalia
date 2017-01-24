<?php

namespace App\Http\Controllers;

use App\Insumo;
use phpDocumentor\Reflection\Types\This;

class InsumosController extends Controller {
	public function index() {
		$insumos = Insumo::all ();
		
		return view ( 'insumos/list', compact ( 'insumos' ) );
	}
	public function create() {
		return view ( 'insumos/create' );
	}
	public function store() {
		$this->validate ( request (), [ 
				'nombre' => [ 
						'required',
						'max:20' 
				] 
		] );
		$data = request ()->all ();
		Insumo::create ( $data );
		return redirect ()->to ( 'insumos' );
	}
}
