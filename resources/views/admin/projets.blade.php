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
			@if (Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
			@endif
		</div>
	</div>
	<div id="listeProjets" class="container">
		<h3>Tous les projets</h3>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th colspan="2">Nom du projet</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($projets as $projet)
				<tr>
					<th>{{ $projet->id }}</th>
					<td>{{ $projet->projetName }}</td>
					<td>
						<a href="" class="btn btn-success">Modifier</a>
						<a href="{{ route('projets.show', ['id' => $projet->id]) }}" class="btn btn-warning">Consulter</a>
						<button class="btn btn-info">Supprimer</button>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection 