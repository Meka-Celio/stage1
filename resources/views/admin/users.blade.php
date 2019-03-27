@extends('template.template')

@section('title', 'Users')
@section('content')
	<h2>Users</h2>
	<br>
	<div id="users">
		<table class="table table-hover">
			@if(isset($users))
			<thead>
				<tr>
					<th>Users</th>
					<th>Nom de l'utilisateur</th>
					<th>E-Mail</th>
					<th>Fonction</th>
					<th>Role</th>
					<th>Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>
							<img src="{{ asset('img/user.png') }}" alt="" style="height: 60px; width: 60px;">
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						@if ($user->fonction == 'developpeur')
							<td>Developpeur</td>
						@elseif ($user->fonction == 'integrateur')
							<td>Integrateur</td>
						@elseif ($user->fonction == 'graphiste')
							<td>Graphiste</td>
						@else
							<td>Chef de Projet</td>
						@endif

						<td>{{ $user->role }}</td>
						<td>
							<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-success">Modifier</a>
							<a href="" class="btn btn-primary">
								Supprimer
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
			@else
			<p>Il n'y a aucun utilisateurs pour le moment</p>
			@endif
		</table>		
	</div>
	<div>
		<a href="{{ route('users.create', ['action' => 'create']) }}" class="btn btn-info">Ajouter un utilisateur</a>
	</div>
@endsection
