@extends('template.template')

<?php $action = $_GET['action']; ?>


@section('title', 'Users')
@section('content')
	<h2>Ajouter un utilisateur</h2>
	<br>
	<div id="userForm">
		<form action="{{ route('users.store') }}" class="col-md-4 mx-auto" novalidate="" method="post">
			{{ csrf_field() }}
			<fieldset>
				<div class="form-group">
					<input type="text" name="name" value="" placeholder="Nom..." class="form-control">
					@if($errors->has('name'))
						<div class="alert alert-warning">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<input type="email" name="email" value="" placeholder="E-Mail..." class="form-control">
					@if($errors->has('email'))
						<div class="alert alert-warning">{{ $errors->first('email') }}</div>
					@endif
				</div>
				<div class="form-group">
					<input type="password" name="password" value="" placeholder="Mot de passe..." class="form-control">
					@if($errors->has('password'))
						<div class="alert alert-warning">{{ $errors->first('password') }}</div>
					@endif
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
			<button class="btn btn-info">Créer un utilisateur</button>
		</form>
	</div>
@endsection
