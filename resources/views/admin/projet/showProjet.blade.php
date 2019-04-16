@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')

	<!-- Projet -->
	<div class="container" id="oneProjet">
		<h1>{{ $pro->projetName }}</h1>
		
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
							<a href="{{ route('rubriques.show', ['id' => $rubrique->id]) }}" class="btn btn-info">Consulter</a>
							<a href="{{ route('rubriques.edit', ['id' => $rubrique->id]) }}" class="btn btn-warning">Modifier</a>
							<form action="{{ route('rubriques.destroy', ['id' => $rubrique->id]) }}" method="post">
							{{ method_field('DELETE') }}
							{{csrf_field()}}
							<input type="hidden" name="projet_id" value="{{ $rubrique->projet_id }}">
								<input type="submit" name="" value="Supprimer" class="btn btn-danger">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- Fin rubriques -->
		
		<span>
			<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique" onclick="showCreateRubriqueModal() ">+</button> 
			Ajouter une rubrique
		</span>
		<br>
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
		<a href="{{ route('projets.edit', ['id' => $pro->id]) }}" class="btn btn-warning">Modifier</a>
		<button class="btn btn-danger" onclick="showDeleteProjetModal()">Supprimer le projet</button>
	</div>

@endsection
@endforeach