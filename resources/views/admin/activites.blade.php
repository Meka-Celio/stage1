@extends('template.template')

@section('title', 'Activites')
@section('content') 

    <div class="container" id="activites">
        <h2>Activites</h2>
        <div class="col-md-2">
	        	<button class="btn btn-circle btn-lg btn-success" onclick="showCreateActiviteModal()" id="showModal">
	        		<i class="fas fa-plus" ></i>
	        	</button>
        	</div>
		<hr>
        <!-- Modal de creation d'activite -->
        <div id="block-activite">
            <div id="activiteModal">
                <form action="{{ route('activites.store') }}" method="post" class="form formulaire col-md-8" id="activiteForm">
                	{{ csrf_field() }}
	                <span class="icon-close">
						<button class="btn btn-danger" onclick="closeActiviteModal()" type="button">X</button>
					</span>
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
	                    <td class="row">
	                        <a href="{{ route('activites.show', ['id' => $activite->id]) }}" class="btn btn-info">Consulter</a>
	                        <a href="{{ route('activites.edit', ['id' => $activite->id]) }}" class="btn btn-success">Modifer</a>
	                        <form action="">
	                            <input type="submit" value="Supprimer" class="btn btn-danger">
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