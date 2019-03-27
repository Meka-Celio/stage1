@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')
	<div class="container" id="oneProjet">
		<h2>{{ $pro->projetName }}</h2>
		<span><button class="btn btn-circle btn-success" style="font-size:18px;">+</button> Ajouter une rubrique</span>
		<div class="row" id="espaceRubriques">
			<div class="col-md-4 rubriques">Rubrique 1</div>
		</div>
	</div>
@endsection
@endforeach