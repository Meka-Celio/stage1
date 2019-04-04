@extends('template.template')

@section('title', 'Projets')
@section('content')
	<div id="projet" class="container">
		<div id="frameProjet" class="frame">
			<h2>Ajouter un projet</h2>
			<div class="" style="padding: 10px 0;">
				<form action="" method="post" id="formulaire" novalidate="">
						{{ csrf_field() }}
					<div class="form-group">
						<input type="text" name="projetName" value="" placeholder="Nom du projet" class="form-control" id="projetName">
					</div>
					@if ($errors->has('projetName'))
						<div class="alert alert-danger">
							{{ $errors->first('projetName') }}
						</div>
					@endif
					<input type="submit" name="" value="Valider" class="btn btn-info">
				</form>
			</div> 
			@if (Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
			@endif
		</div>
	</div>
	
	<!-- Liste des projets -->
	<h3>Tous les projets</h3>
	<div class="row">		
		@foreach ($projets as $projet)
		<div class="card">
			<h5 class="card-header bg-success text-light">{{ $projet->projetName }} </h5>
			<div class="card-body">
				<a href="" class="btn btn-primary text-center">Consulter</a>
			</div>
		</div>
		@endforeach
	</div>
@endsection 