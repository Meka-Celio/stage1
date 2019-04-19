@extends('template.template')

@section('title', 'Activites')
@section('content')
@foreach ($activite as $act)
<div id="activite">
		<article class="article col-md-10">
			<header class="bg-success text-white">
				<h3>Activite</h3>
			</header>
			<section>
				<div class="row">
					<p>
						<label for="">Nom de l'activité</label> : {{ $act->nom }} 
					</p>
					||
					<p>
						<label for="">Id du projet</label> : {{ $act->projet_id }} 
					</p>
					||
					<p>
						<label for="">Nom du projet</label> : 
						@foreach($projets as $projet)
							@if ($projet->id == $act->projet_id)
								{{ $projet->projetName }}
							@endif
						@endforeach
					</p>
					<p>Date de création : {{ $act->created_at }}</p>
				</div>
			</section>
			<hr>
			<footer>
				<small>Dernière modification : {{ $act->updated_at }}</small>
			</footer>
		</article>
	</div>
@endforeach
@endsection 