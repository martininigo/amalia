@extends('layout') @section('content')
<h1>Insumos</h1>

<ul>
	@foreach ($insumos as $insumo)
	<li>{{$insumo->nombre}}</li>
	@endforeach
</ul>


<a id='add' href="/insumos/create">Agregar insumo</a>

@endsection
