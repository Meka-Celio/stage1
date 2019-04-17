@extends('template.template')

@section('title', 'Rubriques')
@section('content')

	<div id="lignes">
		<h2>Lignes Budgetaires</h2> 
		<button class="btn btn-success btn-circle">+</button>
		<hr>

		<!-- Modal de creation de Ligne -->
		<div class="modal-container col-md-8">
			<span>
				<button class="btn btn-danger icon-close">X</button>
			</span>
			<form action="" class="form col-md-12 modal-form">
				<fieldset>
					<legend>Nouvelle Ligne</legend>
					<br>
				</fieldset>
				<div class="form-group">
					<label for="libelle">Nom de la ligne</label>
					<input type="text" name="libelle" value="" placeholder="" class="form-control">
				</div>
				
				<!-- ErrorLib -->
				<ul id="errorLibelle"></ul>

				<div class="form-group">
					<label for="montant">Montant Alloué</label>
					<input type="number" name="montant" value="" placeholder="" class="form-control" step="0.01">
				</div>

				<!-- ErrorMontant -->
				<ul id="errorMontant"></ul>

				<div class="form-group">
					<label for="rubrique_id">Rubrique</label>
					<select name="rubrique_id" id="rubrique_id" class="form-control">
						@foreach($rubriques as $rubrique)
						<option value="{{ $rubrique->id }}">{{ $rubrique->libelle }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" name="" value="Valider" class="btn btn-success">
					<input type="reset" name="" value="Annuler" class="btn btn-info">
				</div>
			</form>
		</div>
		<!-- Fin modal -->
		
		@foreach($projets as $projet)
		<!-- Bloc lignes budgetaires -->
		<br>
		<div class="col-md-12 card">
			<table class="table">
				<h5 class="card-header bg-white">{{ $projet->projetName }}</h5>
				<thead class="thead bg-success text-white">
						<tr>
							<th>Code de la rubrique</th>
							<th>Nom de la rubrique</th>
							<th>Date de création</th>
							<th>Dernière modification</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($rubriques as $rubrique)
							@if($rubrique->projet_id == $projet->id)
							<tr class="rubrique_row bg-waning">
								<td>{{ $rubrique->code }}</td>
								<td>{{ $rubrique->libelle }}</td>
								<td>{{ $rubrique->created_at }}</td>
								<td>{{ $rubrique->updated_at }}</td>
								<td class="row">
									<a href="{{ route('rubriques.show', ['id' => $rubrique->id]) }}" class="btn btn-success">O</a>
									<a href="{{ route('rubriques.edit', ['id' => $rubrique->id]) }}" class="btn btn-warning">/</a>
									<form action="{{ route('rubriques.destroy', ['id' => $rubrique->id]) }}" method="post">
									{{ method_field('DELETE') }}
									{{csrf_field()}}
									<input type="hidden" name="projet_id" value="{{ $rubrique->projet_id }}">
										<input type="submit" name="" value="-" class="btn btn-danger">
									</form>
								</td>
							</tr>
							<tr class="">
								<th>Nom de la ligne</th>
								<th>Montant Alloué</th>
								<th>Date de création</th>
								<th>Dernière Modification</th>
								<th></th>
							</tr>
								@foreach($lignes as $ligne)
									@if($ligne->rubrique_id == $rubrique->id)
									<tr class="bg-primary text-white">
										<td>
											{{ $ligne->libelle }}
										</td>
										<td>
											{{ $ligne->montant }} DH
										</td>
										<td>
											{{ $ligne->created_at }}
										</td>
										<td>
											{{ $ligne->updated_at }}
										</td>
										<td class="row">
											<a href="" class="btn btn-success">/</a>
											<form action="">
												<input type="submit" name="" value="-" class="btn btn-success">
											</form>
										</td>
									</tr>
									@endif
								@endforeach
							@endif
						@endforeach
					</tbody>
			</table>
		</div>
		@endforeach

	</div>

@endsection