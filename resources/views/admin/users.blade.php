@extends('template.template')


@section('title', 'Users')
@section('content')
	<h2>Users</h2>
	<br>
	@if (Session::has('message'))
	<div class="alert alert-success">
		{{ Session::get('message') }}
	</div>
	@endif
	
	<!-- Formulaire Modal de creation de User -->
	<div class="form-modal " id="createUserModal">
		<div id="userForm" class="div-modal">
			<h2 style="text-align:center;">Ajouter un utilisateur</h2>
			<br>
			<form action="{{ route('register') }}" class="" method="post" onsubmit="return false">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<input type="text" name="name" value="" placeholder="Nom..." class="form-control" required id="name" onkeyup="valideName()">
						<div id="divErrorName"></div>
					</div>
					<div class="form-group">
						<input type="email" name="email" value="" placeholder="E-Mail..." class="form-control" required id="email" onkeyup="valideEmail()">
						<div id="divErrorMail"></div>
					</div>
					<div class="form-group">
						<input type="password" name="password" value="" placeholder="Mot de passe..." class="form-control" required id="password" onkeyup="validePassword()">
						<div id="divErrorPassword"></div>
					</div>
					<div class="form-group">
						<select name="fonction" id="fonction" class="form-control">
							<option value="developpeur">Developpeur</option>
							<option value="integrateur">Integrateur</option>
							<option value="graphiste">Graphiste</option>
							<option value="chef_projet">Chef de Projet</option>
						</select>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="role" value="admin" placeholder="" class="form-check-input" id="roleA">
						<label for="roleA" class="form-check-label">Admin</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" name="role" value="user" placeholder="" class="form-check-input" id="roleB" checked>
						<label for="roleB" class="form-check-label">User</label>
					</div>
				</fieldset>
				<br>
				<input type="submit" name="" value="Créer un utilisateur" class="btn-info btn">
				<input type="reset" name="" value="Annuler" class="btn btn-success">
			</form>
		</div>
	</div>
	<!-- Fin de formulaireModal -->

	<!-- Tableau des utilisateurs -->
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
					<tr data-id="{{ $user->id }}" data-name="row-{{ $user->id }}">
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
							<button class="btn btn-info" onclick="showDeleteUserModal()">Supprimer</button>
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
		<button class="btn btn-info" onclick="showNewUserModal()">Ajouter un utilisateur</button>
	</div>
@endsection
