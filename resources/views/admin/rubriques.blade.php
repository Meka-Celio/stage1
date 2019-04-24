@extends('template.template')

@section('title', 'Rubriques')
@section('content')

	<div id="rubriques">
		<h2>Rubriques</h2>
		<hr>
		<!-- Les rubriques -->
		<section>
			
			<span>
				<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique" onclick="showModalRubrique() ">+</button> 
				Ajouter une rubrique
			</span>
			<br>
			<br>
			<!-- Modal de creation de rubrique -->
			<div class="modal-container col-md-8">
				<span>
					<button class="btn-danger btn icon-close" onclick="closeModalRubrique()">X</button>
				</span>
				<form id="rubriqueForm" class="form col-md-10 modal-form" method="post" action="{{ route('rubriques.store') }}">
					{{ csrf_field() }}
					<fieldset>
						<legend>
							Nouvelle Rubrique
						</legend>
					</fieldset>
						<div class="form-group">
							<input type="text" name="code" value="" placeholder="Code Rubrique" class="form-control" id="code">
						</div>
						<ul id="errorCode"></ul>
						<div class="form-group">
							<input type="text" name="libelle" value="" placeholder="Nom de la rubrique" class="form-control" id="libelle">
						</div>
						<ul id="errorLib"></ul>
						<div class="form-group">
							Choix du projet
							<select name="projet_id" id="projet_id" class="form-control">
								@foreach ($projets as $projet)
								<option value="{{ $projet->id }}">{{ $projet->projetName }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<input type="submit" name="" value="Ajouter" class="btn btn-success">
							<input type="reset" name="" value="Annuler" class="btn btn-info">
						</div>
				</form>
			</div>
		<!-- Fin Modal -->

			<br>
		@if (Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
		@endif
		
		

		@foreach($projets as $projet)
			<div class="card col-md-12 projets">
				<table class="table">
					<h5 class="card-header bg-white">{{ $projet->projetName }}</h5>
					<thead class="thead bg-success text-white">
						<tr>
							<th>#</th>
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
							<tr class="rubrique_row">
								<td class="affiche-r"></td>
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
							@endif
						@endforeach
					</tbody>
				</table>
				<!-- <hr>
				<p>Nombre de rubriques : <span class="compteur"></span> </p>
				<hr> -->
			</div>
		@endforeach

		</section>
		<!-- Fin rubriques -->

	</div>

@endsection