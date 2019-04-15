@extends('template.template')

@section('title', 'Activites')
@section('content')
@foreach ($activite as $act)
<div id="oneActivite">
	
	<h2>{{ $act->nom }}</h2>
	<hr>

	<div class="btn btn-success" id="btnAddDepense">
		Nouvelle Dépense
	</div>

	<div class="modal-block">

	<!-- Modal de Dépenses -->
	<form action="" class="form col-md-8 bg-primary text-white" id="depenseForm">
		<fieldset>
			<span class="icon-close">
				<button class="btn btn-danger">X</button>
			</span>
			<legend>Nouvelle dépense</legend>
			<div class="form-group">
				<label for="">Nom de la dépense</label>
				<input type="text" name="nom" value="" placeholder="" class="form-control">
			</div>
			<div id="errorNom"></div>
			<div class="form-group">
				<label for="">Cout</label>
				<input type="number" name="cout" value="" placeholder="" class="form-control" step="0.01">
			</div>
			<div id="errorCout"></div>
			<input type="hidden" name="activite_id" value="{{ $act->id }}">
			<div class="form-group">
				<label for="">Ligne budgetaire
					<select name="ligne_id" id="" class="form-control">
						@foreach($rubriques as $rubrique)
							@if ($rubrique->projet_id == $act->projet_id)
								@foreach($lignes as $ligne)
									@if ($ligne->rubrique_id == $rubrique->id)
										@if (!$ligne->libelle)
											<p>Il n'y a aucune ligne bugetaire pour cette rubrique</p>
										@else
											<option value="{{ $ligne->id }}">{{ $ligne->libelle }}</option>
										@endif
									@endif
								@endforeach
							@endif
						@endforeach
					</select>
				</label>
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Valider" class="btn-info btn">
				<input type="reset" name="" value="Annuler" class="btn-success btn">
			</div>
		</fieldset>
	</form>
	<!-- End Modal -->
	</div>
	
	<!-- Tableau des dépenses -->
	<table class="table">
		<thead class="thead bg-primary text-white">
			<tr>
				<th>Nom de la dépense</th>
				<th>Coût de la dépense</th>
				<th>Nom de la ligne budgetaire</th>
				<th>Options</th>
			</tr>
		</thead>
	</table>
	<!-- End table -->

</div>
@endforeach
@endsection 