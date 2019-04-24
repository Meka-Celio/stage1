@extends('template.template')

@section('title', 'Projets')
@section('content')

	<div id="projets">
		<h2>Projets</h2>
		<hr>
		<!-- Modal Projet -->
		<div>
			<button class="btn btn-success btn-circle" onclick="showModalProjet()">+</button><span> Nouveau Projet</span>
		</div>
		<!-- Formulaire -->
		<div class="modal-container col-md-8" id="modalProjet">
			<div><button class="btn btn-danger icon-close" onclick="closeModalProjet()">X</button></div>
			<form action="{{ route('projets.store') }}" class="form modal-form" id="projetForm" method="post">
				{{csrf_field()}}
				<fieldset>
					<legend>Ajouter Un projet</legend>
					<div class="form-group">
						<input type="text" name="projetName" value="" placeholder="Nom du projet" class="form-control" id="projetName">
					</div>
					<!-- Error -->
					<ul id="error_projetName"></ul>
					<!-- --- -->
					<div class="form-group">
						<button class="btn btn-info">Valider</button>
					</div>
				</fieldset>
			</form>
		</div>
		<!-- Fin Modal Projet -->
		<hr>
		@if (Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
		@endif

		<!-- Liste des projets -->
		<h3>Tous les projets</h3>
		<table class="table">
			<thead class="thead text-white bg-success">
				<tr>
					<th>#</th>
					<th>Nom du projet</th>
					<th>Date de création</th>
					<th>Dernière modification</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($projets as $projet)
				<tr class="projet_row">
					<td class="affiche"></td>
					<td>{{ $projet->projetName }} ...</td>
					<td>{{ $projet->created_at }}</td>
					<td>{{ $projet->updated_at }}</td>
					<td class="row">
						<a href="{{ route('projets.show', ['id' => $projet->id]) }}" class="btn btn-success">O</a>
						<a href="{{ route('projets.edit', ['id' => $projet->id]) }}" class="btn btn-warning">/</a>
						<form action="{{ route('projets.destroy', ['id' => $projet->id]) }}" method="post" class="form" id="deleteProjetForm">
							{{ method_field('delete') }}
							{{csrf_field()}}
							<input type="submit" name="" value="-" class="btn btn-danger">
						</form>
					</td>
					<td></td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

@endsection 