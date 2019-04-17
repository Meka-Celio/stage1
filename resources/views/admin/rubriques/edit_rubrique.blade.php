@extends('template.template')

@foreach($rubrique as $rub)

@section('title', $rub->libelle)
@section('content')

	<div id="rubrique">
        <!-- Modal de creation de rubrique -->
			<div class="col-md-8">
				<form id="rubriqueForm" class="form col-md-10 " method="post" action="{{ route('rubriques.update', ['id' => $rub->id]) }}">
					{{ method_field('PUT') }}
					{{ csrf_field() }}
					<fieldset>
						<legend>
							Modifier une Rubrique
						</legend>
					</fieldset>
						<div class="form-group">
							<input type="text" name="code" value="{{ $rub->code }}" placeholder="Code Rubrique" class="form-control" id="code">
						</div>
						<ul id="errorCode"></ul>
						<div class="form-group">
							<input type="text" name="libelle" value="{{ $rub->libelle }}" placeholder="Nom de la rubrique" class="form-control" id="libelle">
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

		<article class="article col-md-10">
			<header class="bg-success text-white">
				<h3>Rubrique</h3>
			</header>
			<section>
				<div class="row">
					<p>
						<label for="">Code de la rubrique</label> : {{ $rub->code }} 
					</p>
					||
					<p>
						<label for="">Nom de la rubrique</label> : {{ $rub->libelle }} 
					</p>
					||
					<p>
						<label for="">Id du projet</label> : {{ $rub->projet_id }} 
					</p>
					||
					<p>
						<label for="">Nom du projet</label> : 
						@foreach($projets as $projet)
							@if ($projet->id == $rub->projet_id)
								{{ $projet->projetName }}
							@endif
						@endforeach
					</p>
					<p>Date de création : {{ $rub->created_at }}</p>
				</div>
			</section>
			<hr>
			<footer>
				<small>Dernière modification : {{ $rub->updated_at }}</small>
			</footer>
		</article>

	</div>

@endsection

@endforeach
