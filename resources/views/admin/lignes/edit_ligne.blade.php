@extends('template.template')

@section('title', 'Lignes-edit')
@section('content')

<div id="popUp" class="pop-up">
	<!-- Pop Up de modification -->
	<div class="container">
		@foreach($ligne as $l)
		<div class="pop-up-header col-md-12">
			<h4>Modifier une Ligne Budgetaire</h4>
		</div>
		<div class="pop-up-section col-md-12">
			<form action="{{ route('lignes.update',['id' => $l->id]) }}" class="form col-md-12 modal-form" method="post" id="ligneEditFormulaire_e">
				{{method_field('put')}}
					{{csrf_field()}}
					<div class="form-group">
						<label for="libelle">Nom de la ligne</label>
						<input type="text" name="libelle" value="{{ $l->libelle }}" placeholder="" class="form-control" id="libelle_e">
					</div>
					
					<!-- ErrorLib -->
					<ul id="errorLigneLibelle_e"></ul>

					<div class="form-group">
						<label for="montant">Montant Alloué</label>
						<input type="number" name="montant" value="{{ $l->montant }}" placeholder="" class="form-control" step="0.01" id="montant_e">
					</div>

					<!-- ErrorMontant -->
					<ul id="errorLigneMontant_e"></ul>

					<div class="form-group">
						<label for="rubrique_id">Rubrique</label>
						<select name="rubrique_id" id="rubrique_id" class="form-control">
							@foreach($rubriques as $rubrique)
							<option value="{{ $rubrique->id }}">{{ $rubrique->libelle }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-warning">Mise à jour</button>
						<a href="{{ route('lignes.index') }}" class="btn btn-info">Annuler</a>
					</div>
				</form>
		</div>
		<div class="pop-up-footer col-md-12">
			<small class="pop-up bottom-right-text">Dernière modification : {{ $l->updated_at }}</small>
		</div>
		@endforeach
	</div>
<!-- Fin de popup -->
</div>
@endsection