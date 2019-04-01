@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')
	<div class="container" id="oneProjet">
		<h2 class="display-2">{{ $pro->projetName }}</h2>
		<span>
			<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique">+</button> 
			Ajouter une rubrique
		</span>
		<div class="row" id="espaceRubriques">
			
		</div>
	</div>

	<!-- Modal de creation de rubrique -->
	<div class="rubrique-modal" id="createNewRubrique">
		<div class="div-modal">
			<form action="" id="rubrique-form">
				<fieldset>
					<div class="form-group">
						<label for="">Code de rubrique
							<input type="text" name="" value="" placeholder="" class="form-control">
						</label>
					</div>
					<div class="form-group">
						<label for="">Nom de la Rubrique
							<input type="text" name="" value="" placeholder="" class="form-control">
						</label>
					</div>
					<input type="number" name="" value="{{ $pro->id }}">
				</fieldset>
			</form>
		</div>
	</div>

@endsection
@endforeach