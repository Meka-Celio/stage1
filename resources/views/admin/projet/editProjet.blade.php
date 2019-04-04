@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')

	<!-- Modal de suppression de projet-->
	<div class="frame-modal">
		<div class="delete-modal">
			<h3>Voulez-vous supprimer ?</h3>
			<div class="row modal-buttons-space">
				<form action="">
					<input type="submit" name="" value="Oui" class="btn btn-success">
				</form>
				<button class="btn-info btn">Non</button>
			</div>
		</div>
	</div>
	<!-- fin Modal -->

	<!-- Projet -->
	<div class="container" id="oneProjet">
		<h1>{{ $pro->projetName }}</h1>
		<span>
			<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique">+</button> 
			Ajouter une rubrique
		</span>
		<div class="row" id="espaceRubriques">
			
		</div>
	</div>
	<!-- Fin projet -->

	<!-- Modal de creation de rubrique -->
	<div class="frame-modal">
		<div class="div-modal" id="createNewRubrique">
			<form action="" id="rubriqueForm" class="form">
				{{ csrf_field() }}
					<div class="form-group">
						<label for="">Code de rubrique
							<input type="text" name="code" value="" placeholder="" class="form-control">
						</label>
					</div>
					<div class="form-group">
						<label for="">Nom de la Rubrique
							<input type="text" name="libelle" value="" placeholder="" class="form-control">
						</label>
					</div>
					<input type="hidden" name="projet_id" value="{{ $pro->id }}">
					<div class="form-group">
						<input type="submit" name="" value="Ajouter" class="btn btn-success">
						<input type="reset" name="" value="Annuler" class="btn btn-info">
					</div>
			</form>
		</div>
		<div class="row modal-buttons-space" class="ligne-budget">
			<button class="btn btn-info">
				Ajouter une ligne budgetaire
			</button>
		</div>
		<!-- Modal de ligne budgetaire -->
		<div class="frame-modal-inner">
			<div class="div-modal">
				
			</div>
		</div>
		<!-- Fin Modal -->
	</div>
	<!-- Fin Modal -->



@endsection
@endforeach