@extends('template.template')

@section('title', 'Projets')
@section('content')
	<div id="projet" class="container">
		<div id="frameProjet" class="frame">
			<h2>Ajouter un projet</h2>
			<div class="" style="padding: 10px 0;">
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
	
	<!-- Liste des projets -->
	<h3>Tous les projets</h3>
	<table class="table">
		<thead class="thead">
			<tr>
				<th>#</th>
				<th colspan="2">Nom du projet</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projets as $projet)
			<tr>
				<td>{{ $projet->id }}</td>
				<td>{{ $projet->projetName }} ...</td>
				<td>
					<a href="{{ route('projets.show', ['id' => $projet->id]) }}" class="btn btn-success">Consulter</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection 