@extends('template.template')

@section('title', 'Rubriques')
@section('content')

	<div id="rubriques">
		
		

		<!-- Les rubriques -->
		<section>
			
			<span>
				<button class="btn btn-circle btn-success" style="font-size:18px;" id="btnNewRubrique" onclick="showCreateRubriqueModal() ">+</button> 
				Ajouter une rubrique
			</span>
			<br>

			<!-- Modal de creation de rubrique -->
		<div class="frame-modal" id="createNewRubrique">
			<div class="div-modal">
				<span class="icon-close">
					<button class="btn-danger btn" onclick="closeRubriqueModal()">X</button>
				</span>
				<form id="rubriqueForm" class="form col-md-10" method="post" action="{{ route('rubriques.store') }}">
					{{ csrf_field() }}
						<div class="form-group">
							<label for="code">Code de rubrique
								<input type="text" name="code" value="" placeholder="" class="form-control" id="code">
								<p id="spaceErrorCode"></p>
							</label>
						</div>
						<div class="form-group">
							<label for="libelle">Nom de la Rubrique
								<input type="text" name="libelle" value="" placeholder="" class="form-control" id="libelle">
								<p id="spaceErrorLibelle"></p>
							</label>
						</div>
						<div class="form-group">
							<input type="submit" name="" value="Ajouter" class="btn btn-success">
							<input type="reset" name="" value="Annuler" class="btn btn-info">
						</div>
				</form>
				
			</div>
		</div>
		<!-- Fin Modal -->

			<br>
		@if (Session::has('message'))
			<div class="alert alert-success">
				{{ Session::get('message') }}
			</div>
		@endif
		
		@foreach($projets as $projet)
			<div class="card col-md-12">
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
							<tr>
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
			</div>
		@endforeach

		</section>
		<!-- Fin rubriques -->

	</div>

@endsection