<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use phpDocumentor\Reflection\Types\This;
use App\Insumo;
class InsumosTest extends TestCase {
	
	use DatabaseTransactions;
	
	public function testCreateInsumo() {
		$this->visit ( 'insumos' )->click ( 'add' )->seePageIs ( 'insumos/create' )->type ( 'huevo', 'nombre' )->press ( 'create' )->seePageIs ( 'insumos' )
		->see ( 'Huevo' )->seeInDatabase ( 'insumos', [ 
				'nombre' => 'Huevo' 
		] );
	}
	public function testListInsumos() {
		Insumo::create ( [ 
				'nombre' => 'Azucar' 
		] );
		Insumo::create ( [ 
				'nombre' => 'Harina' 
		] );
		
		$this->visit ( 'insumos' )->see ( 'Azucar' )->see ( 'Harina' );
	}
}
