@extends('layout') @section('content')

<div class="bs-docs-section">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header">
				<h1 id="forms">Crear Nuevo Insumo</h1>
			</div>
			@include('errors/validate_error')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="well bs-component">
				<form method="post" action="{{ url('insumos')}}"
					class="form-horizontal">
					{!!csrf_field()!!}
					<fieldset>
						<legend>Datos Básicos</legend>
						<div class="form-group">
							<label class="col-lg-2 control-label">Nombre</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="nombre"
									placeholder="{{old('nombre', 'ingrese el nombre ...')}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Descripción</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="descripcion">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Unidad</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="unidad">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Cantidad</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="cantidad">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Precio </label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="precio">
							</div>
						</div>

					</fieldset>
					<button type="submit" name="create" class="btn btn-default">Crear
						Insumo</button>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
