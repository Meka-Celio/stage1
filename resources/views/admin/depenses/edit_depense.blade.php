@extends('template.template')

@section('title', 'Dépenses')
@section('content') 

<div id="depenses">
	
	@foreach($depense as $dep)
	<!-- Modal de dépense -->
	<form action="{{ route('depenses.update', ['id' => $dep->id]) }}" class="form col-md-8" method="post" id="depenseForm">
		{{method_field('put')}}
		{{ csrf_field() }}
		<fieldset>
			<legend>Modifier une Dépense</legend>
			<div class="form-group">
				<input type="text" name="nom" value="{{ $dep->nom }}" placeholder="Nom de la dépense" class="form-control" id="Vnom">
			</div>
			<div id="errorNom"></div>
			<div class="form-group">
				<input type="number" name="cout" value="{{ $dep->cout }}" placeholder="Cout de la dépense" class="form-control" step="0.01" id="Vcout">
			</div>
			<div id="errorCout"></div>
			<div class="form-group">
				Activité :
				<select name="activite_id" id="" class="form-control">
					@foreach($activites as $activite)
						<option value="{{ $activite->id }}">{{ $activite->nom }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				Ligne Budgetaire :
				<select name="ligne_id" id="" class="form-control">
					@foreach($lignes as $ligne)
						<option value="{{ $ligne->id }}">{{ $ligne->libelle }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Màj" class="btn btn-warning">
				<input type="reset" name="" value="Annuler" class="btn btn-info">
			</div>
		</fieldset>
	</form>
	<!-- fin de modal dépense -->
	@endforeach
	
	@if (Session::has('message'))
    	<div class="alert alert-info">
    		{{ Session::get('message') }}
    	</div>
    	@endif

	<!-- Tableau des dépenses -->
	<table class="table">
		<thead class="thead bg-success text-white">
			<tr>
				<th>Nom</th>
				<th>Cout</th>
				<th>Activité</th>
				<th>Ligne budgetaire</th>
				<th>Date de création</th>
				<th>Dernière modification</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($activites as $activite)
			@foreach($lignes as $ligne)
				@foreach($depenses as $depense)
					@if($activite->id == $depense->activite_id && $ligne->id == $depense->ligne_id)
						<tr>
							<td>{{ $depense->nom }}</td>
							<td>{{ $depense->cout }} DH</td>
							<td>{{ $activite->nom }}</td>
							<td>{{ $ligne->libelle }}</td>
							<td>{{ $depense->created_at }}</td>
							<td>{{ $depense->updated_at }}</td>
							<td class="row">
								<a href="{{ route('depenses.edit', ['id' => $depense->id]) }}" class="btn btn-warning">/</a>
								.
								<form action="{{ route('depenses.destroy', ['id' => $depense->id]) }}" method="post">
									{{method_field('delete')}}
									{{csrf_field()}}
									<input type="submit" name="" value="-" class="btn btn-danger">
								</form>
							</td>
						</tr>
					@endif
				@endforeach
			@endforeach
			@endforeach
		</tbody>
	</table>
	<!-- fin tableau -->

</div>

@endsection