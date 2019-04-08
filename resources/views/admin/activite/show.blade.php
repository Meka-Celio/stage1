@extends('template.template')

@section('title', 'Activites')
@section('content')
@foreach ($activite as $act)
<div id="oneActivite">
	
	<h2>{{ $act->nom }}</h2>
	<hr>

	<div class="btn btn-success">
		Nouvelle Dépense
	</div>
	
	<!-- Tableau des dépenses -->
	<!-- End table -->

	<!-- Modal de Dépenses -->
	<form action="" class="form col-md-8">
		<fieldset>
			<div class="form-group">
				<label for="">Nom de la dépense</label>
				<input type="text" name="nom" value="" placeholder="" class="form-control">
			</div>
			<div class="form-group">
				<label for="">Cout</label>
				<input type="number" name="cout" value="" placeholder="" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" name="" value="Valider" class="btn-info btn">
				<input type="reset" name="" value="Annuler" class="btn-success btn">
			</div>
		</fieldset>
	</form>
	<!-- End Modal -->

</div>
@endforeach
@endsection