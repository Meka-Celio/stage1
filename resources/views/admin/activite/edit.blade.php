@extends('template.template')

@section('title', 'Activites')
@section('content')
@foreach ($activite as $act)
<div id="oneActivite">
	
	<!-- Modal de creation d'activite -->
        <div id="block-activite">
            <div id="">
                <form action="{{ route('activites.update', ['id' => $act->id]) }}" method="post" class="form formulaire col-md-8" id="activiteForm">
                	{{ method_field('put') }}
                	{{ csrf_field() }}
                    <fieldset>
                        <legend>Modifier une Activité</legend>
                        <div class="form-group">
                            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de l'activite" value="{{ $act->nom }}">
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

	<hr>

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
	                        <form action="">
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
@endforeach
@endsection 