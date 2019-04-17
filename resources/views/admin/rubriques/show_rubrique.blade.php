@extends('template.template')

@foreach($rubrique as $rub)

@section('title', $rub->libelle)
@section('content')

	<div id="rubrique">
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
