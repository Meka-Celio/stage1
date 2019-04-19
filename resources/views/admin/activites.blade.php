@extends('template.template')

@section('title', 'Activites')
@section('content') 

    <div class="container" id="activites">
        <h2>Activites</h2>
		<hr>
        <!-- Modal de creation d'activite -->
        <div id="block-activite">
            <div id="activiteModal">
                <form action="{{ route('activites.store') }}" method="post" class="form formulaire col-md-8" id="activiteForm">
                	{{ csrf_field() }}
                    <fieldset>
                        <legend>Nouvelle Activite</legend>
                        <div class="form-group">
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de l'activite">
                        </div>
                        <div class="form-group">
                            <select name="projet_id" id="projet_id" class="form-control">
                                @foreach($projets as $projet)
                                	<option value="{{ $projet->id }}">{{ $projet->projetName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <ul id="errorNameActivite" style="display: none;">
                        	<li></li>
                        </ul>
                        <div class="form-group">
                            <input type="submit" value="Valider" class="btn btn-info">
                            <input type="reset" name="" value="Annuler" class="btn btn-success">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- Fin de modal -->

		@if (Session::has('message'))
    	<div class="alert alert-info">
    		{{ Session::get('message') }}
    	</div>
    	@endif

        <!-- Tableau des activites -->
        <table class="table">
           <thead class="thead">
                <tr>
                    <th>Nom de l'activite</th>
                    <th>Nom du projet</th>
                    <th>Date de création</th>
                    <th>Dernière Modification</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            	@foreach ($projets as $projet)
                @foreach($activites as $activite)
					@if($activite->projet_id == $projet->id)
	                <tr>
	                    <td>{{ $activite->nom }}</td>
	                    <td>
	                    	{{ $projet->projetName }}
	                    </td>
                        <td>{{ $activite->created_at }}</td>
                        <td>{{ $activite->updated_at }}</td>
	                    <td class="row">
	                        <a href="{{ route('activites.show', ['id' => $activite->id]) }}" class="btn btn-success">O</a>
	                        <a href="{{ route('activites.edit', ['id' => $activite->id]) }}" class="btn btn-warning">/</a>
	                        <form action="{{ route('activites.destroy', ['id' => $activite->id]) }}" method="post" class="form">
                                {{method_field('delete')}}
                                {{csrf_field()}}

	                            <input type="submit" value="-" class="btn btn-danger">
	                        </form>
	                    </td>
	                </tr>
	                @endif	
                @endforeach
                @endforeach
            </tbody>
        </table>
        <!-- Fin table -->
        
    </div>
@endsection