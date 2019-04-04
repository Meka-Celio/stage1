@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')

	<!-- Modal de suppression de projet-->
	<div class="frame-modal" id="deleteProjetModal">
		<div class="delete-modal">
			<p>Etes-vous sur de supprimer ce projet ?</p>
			<div class="row modal-buttons-space">
				<form action="">
					<input type="submit" name="" value="Oui" class="btn btn-success">
				</form>
				<button class="btn-info btn" onclick="closeDeleteProjetModal() ">Non</button>
			</div>
		</div>
	</div>
	<!-- fin Modal -->

	<!-- Projet -->
	<div class="container" id="oneProjet">
		<form action="{{ route('projets.update', ['id' => $pro->id]) }}" class="form" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<fieldset>
				<legend>Editer un projet</legend>
				<div class="form-group">
					<label for="">Nom du projet
						<input type="text" name="projetName" value="{{ $pro->projetName }}" class="form-control">
					</label>
				</div>
				<div class="form-group">
					<input type="submit" name="" value="Mise à jour" class="btn btn-warning">
				</div>
			</fieldset>
		</form>
		@if($errors->has('projetName'))
		<ul class="alert alert-danger">
			<li>{{ $errors->first('projetName') }}</li>
		</ul>
		@endif
		<span>
			<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique" onclick="showCreateRubriqueModal() ">+</button> 
			Ajouter une rubrique
		</span>
		<br>
		<br>
		
		<!-- Les rubriques -->
		<div id="rubriques" class="container">
			<table class="table">
				<thead class="bg-success text-light">
					<tr>
						<th>Code de la rubrique</th>
						<th>Nom de la rubrique</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rubriques as $rubrique)
					<tr>
						<td>{{ $rubrique->code }}</td>
						<td>{{ $rubrique->libelle }}</td>
						<td class="row">
							<a href="" class="btn btn-info">Consulter</a>
							<a href="" class="btn btn-warning">Modifier</a>
							<form action="">
								<input type="submit" name="" value="Supprimer" class="btn btn-danger">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- Fin page -->

	</div>
	<!-- Fin projet -->
	<br>

	@if (Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
	@endif

	<!-- Modal de creation de rubrique -->
	<div class="frame-modal" id="createNewRubrique">
		<div class="div-modal">
			<span class="icon-close">
				<button class="btn-danger btn" onclick="closeRubriqueModal()">X</button>
			</span>
			<form id="rubriqueForm" class="form" method="post" action="{{ route('rubriques.store') }}">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="code">Code de rubrique
							<input type="text" name="code" value="" placeholder="" class="form-control" id="code">
							<p id="spaceErrorCode"></p>
						</label>
					</div>
					<div class="form-group">
						<label for="libelle">Nom de la Rubrique
							<input type="text" name="libelle" value="" placeholder="" class="form-control" id="libelle">
							<p id="spaceErrorLibelle"></p>
						</label>
					</div>
					<input type="hidden" name="projet_id" value="{{ $pro->id }}">
					<div class="form-group">
						<input type="submit" name="" value="Ajouter" class="btn btn-success">
						<input type="reset" name="" value="Annuler" class="btn btn-info">
					</div>
			</form>
			
		</div>
	</div>
	<!-- Fin Modal -->
	<br>
	<div>
		<button class="btn btn-danger" onclick="showDeleteProjetModal() ">Supprimer le projet</button>
	</div>

@endsection
@endforeach