@extends('template.template')


@section('title', 'Edit User')
@section('content')
	<h2>Modifier un utilisateur</h2>
	<br>
	<div id="userForm" class="div-modal">
		@foreach($user as $u)
		<form action="{{ route('users.update', ['id' => $u->id]) }}" class="col-md-4 mx-auto" novalidate="" method="post">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<fieldset>
				<div class="form-group">
					<input type="text" name="name" value="{{ $u->name }}" placeholder="Nom..." class="form-control">
					@if($errors->has('name'))
						<div class="alert alert-warning">{{ $errors->first('name') }}</div>
					@endif
				</div>
				<div class="form-group">
					<label for="" class="form-label">{{ $u->email }}</label>
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
			<button class="btn btn-info">Modifier un utilisateur</button>
		</form>
		@endforeach
	</div>
@endsection
