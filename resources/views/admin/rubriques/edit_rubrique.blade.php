@extends('template.template')

@foreach($rubrique as $rub)

@section('title', $rub->libelle)
@section('content')

@foreach ($projets as $projet)
    @if ($projet->id == $rub->projet_id)
		<h1>Projet : {{ $projet->projetName }}</h1>
		<br>
	@endif
@endforeach 

	<div id="rubrique">
        <form action="{{ route('rubriques.update', ['id' => $rub->id]) }}" class="form" id="editRubriqueForm" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="code" value="{{ $rub->code }}">
            <div class="form-group">
                <label for="libelle">Nom de la rubrique
                    <input type="text" name="libelle" id="libelle" value="{{ $rub->libelle }}" class="form-control">
                </label>
            </div>
            <!-- Afficher les erreurs -->
                <ul id="errorLib"></ul>
            <!-- end -->
            <input type="hidden" name="projet_id" value="{{ $rub->projet_id }}">
            <div class="form-group">
                <input type="submit" value="Mise à jour" class="btn btn-warning">
                <a href="{{ route('rubriques.show', ['id' => $rub->id]) }}" class="btn btn-info">Annuler</a>
            </div>
        </form>
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
							<a href="{{ route('lignes.edit', ['id' => $ligne->id, 'rubrique_id' => $ligne->rubrique_id]) }}" class="btn btn-warning">Modifier</a>
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

	</div>

@endsection

@endforeach
