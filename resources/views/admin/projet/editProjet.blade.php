@extends('template.template')

@foreach($projet as $pro)
@section('title', $pro->projetName)
@section('content')

	<div id="projet">
		<table class="table col-md-8">
			<thead class="bg-success text-white">
				<tr>
					<th>Nom du projet</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<form action="{{ route('projets.update', ['id' => $pro->id]) }}" class="form" id="projetForm" method="post">
							{{ method_field('put') }}
							{{csrf_field()}}
							<fieldset>
								<legend>Modifier Un projet</legend>
								<div class="form-group">
									<input type="text" name="projetName" value="{{$pro->projetName}}" placeholder="Nom du projet" class="form-control" id="projetName">
								</div>
								<!-- Error -->
								<ul id="error_projetName"></ul>
								<!-- --- -->
								<div class="form-group">
									<button class="btn btn-info">Valider</button>
								</div>
							</fieldset>
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

@endsection
@endforeach