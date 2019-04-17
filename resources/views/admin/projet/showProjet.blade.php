@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')

	<div id="projet">
		<article class="col-md-8 text-center">
			<header class="bg-success text-white">
				<h3>Projet</h3>
			</header>
			<section class="row">
				<p>Nom du projet : <h4>{{ $pro->projetName }}</h4></p>
				||
				<p>Date de création : {{ $pro->created_at }}</p>
			</section>
			<footer>
				<small>
					Dernière modification le : {{ $pro->updated_at }}
				</small>
			</footer>
		</article>
	</div>

@endsection
@endforeach