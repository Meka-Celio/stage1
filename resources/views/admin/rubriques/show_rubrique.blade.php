@extends('template.template')

@foreach($rubrique as $rub)

@section('title', $rub->libelle)
@section('content')

@foreach ($projets as $projet)
	@if ($projet->id == $rub->projet_id)
		<h1>Projet : {{ $projet->projetName }}</h1>
		<br>
		<?php $id_projet = $projet->id; ?>
	@endif
@endforeach

	<div id="rubrique">
		<h2>Rubrique : {{ $rub->libelle }}</h2>
		<hr>

		@if (Session::has('message'))
		<div class="alert alert-success">
			{{ Session::get('message') }}
		</div>
		@endif
		<!-- Tableau des lignes budgetaires -->
		<table class="table">
			<thead class="thead bg-success text-light">
				<tr>
					<th>Nom de la ligne</th>
					<th>Montant</th>
					<th>Options</th>
				</tr>
				<tr></tr>
			</thead>
			<tbody>
				@foreach ($lignes as $ligne)
					@if ($rub->id == $ligne->rubrique_id)
					<tr>
						<td>{{ $ligne->libelle }}</td>
						<td>{{ $ligne->montant }} DH</td>
						<td class="row">
							<a href="{{ route('lignes.edit', ['id' => $ligne->id]) }}" class="btn btn-warning">Modifier</a>
							<form action="{{ route('lignes.destroy', ['id' => $ligne->id]) }}" method="post">
								{{ method_field('delete') }}
								{{csrf_field()}}
								<input type="hidden" name="rubrique_id" value="{{ $ligne->rubrique_id }}">
								<input type="submit" name="" value="Supprimer" class="btn btn-danger">
							</form>
						</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>

		<div class="">
			<button class="btn btn-success" onclick="showLigneBudgetModal()" id="addLigne">Ajouter une ligne budgetaire</button>
		</div>

		<!-- Modal de creation de ligneBudgetaire -->
		<div id="modalLigneBudget" class="modal-container">
			<form action="{{ route('lignes.store') }}" class="form col-md-10" method="post" id="ligneForm">
				{{ csrf_field() }}
				<legend>Nouvelle Ligne Budgetaire</legend>
				<span class="icon-close">
					<button class="btn btn-danger" onclick="closeLigneBudgetModal()" type="button">X</button>
				</span>
				<div class="form-group">
					<input type="text" class="form-control" id="libelle" name="libelle" placeholder="* Nom de la ligne">
				</div>
				<ul id="errorLigneLibelle"></ul>
				<div class="form-group">
					<input type="number" class="form-control" step="0.01" id="montant" name="montant" placeholder="* Montant Alloué">
				</div>
				<ul id="errorLigneMontant"></ul>
				<input type="hidden" name="rubrique_id" value="{{ $rub->id }}">
				<div class="form-group">
					<input type="submit" name="" value="Valider" class="btn btn-info">
					<input type="reset" name="" value="Annuler" class="btn btn-success">
				</div>
			</form>
		</div>
		<!-- Fin modal -->
		<div>
			<a href="{{ route('rubriques.edit', ['id' => $rub->id]) }}" class="btn btn-warning">Modifier la rubrique</a>
			<button class="btn btn-danger">Supprimer la rubrique</button>
		</div>

	</div>

@endsection

@endforeach
