@extends('template.template')

@section('title', 'Projets')
@section('content')
	<div id="projet" class="container">
		<div id="frameProjet" class="frame">
			<h2>Ajouter un projet</h2>
			<div class="col-md-8" style="padding: 10px 0;">
				<form action="" method="post" id="formulaire" novalidate="">
						{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="projetName" value="" placeholder="Nom du projet" class="form-control" id="projetName">
					</div>
					@if ($errors->has('projetName'))
						<div class="alert alert-danger">
							{{ $errors->first('projetName') }}
						</div>
					@endif
					<input type="submit" name="" value="Valider" class="btn btn-info">
				</form>
			</div> 
		</div>
	</div>
	<div id="listeProjets" class="container">
		<h3>Tous les projets</h3>
		<ul class="row">
			@foreach($projets as $projet)
			<li class="col-md-3"><a href="{{ route('projets.show', ['id' => $projet->id ]) }}">{{ $projet->projetName }}</a></li>
			@endforeach
		</ul>
	</div>
@endsection 