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
				@foreach ($ligne as $l)
				<tr>
					<td>{{ $l->libelle }}</td>
					<td>{{ $l->montant }} DH</td>
					<td>
						<!-- Modal de modification de ligneBudgetaire -->
							<form action="{{ route('lignes.update', ['id' => $l->id]) }}" class="form col-md-10" method="post" id="ligneForm">
							{{ method_field('put') }}
								{{ csrf_field() }}
								<div class="form-group">
									<input type="text" class="form-control" id="libelle" name="libelle" placeholder="* Nom de la ligne" value="{{ $l->libelle }}">
								</div>
								<ul id="errorLigneLibelle"></ul>
								<div class="form-group">
									<input type="number" class="form-control" step="0.01" id="montant" name="montant" placeholder="* Montant Alloué" value="{{ $l->montant }}">
								</div>
								<ul id="errorLigneMontant"></ul>
								<input type="hidden" name="rubrique_id" value="{{ $rub->id }}">
								<div class="form-group">
									<input type="submit" name="" value="Valider" class="btn btn-info">
									<input type="reset" name="" value="Annuler" class="btn btn-success">
								</div>
							</form>
						<!-- Fin modal -->
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		
		<div>
			<a href="{{ route('rubriques.edit', ['id' => $rub->id]) }}" class="btn btn-warning">Modifier la rubrique</a>
			<button class="btn btn-danger">Supprimer la rubrique</button>
		</div>

	</div>

@endsection

@endforeach
