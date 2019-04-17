'use strict'

var form = document.getElementById('projetForm');

//  Validation du formulaire
form.addEventListener('submit', function(e){

	var projetName  = document.getElementById('projetName').value.trim();
	var input 	= document.getElementById('projetName');
	var ok = false;
	var errorDiv 	= document.getElementById('error_projetName');

	// Si projetName est vide
	if (projetName == ""){
		errorDiv.classList.add('alert', 'alert-danger');
		errorDiv.innerHTML = "Remplir le champ !";
		input.focus();
	}
	// Sinon
	else{
		errorDiv.classList.remove('alert','alert-danger');
		errorDiv.innerHTML = "";
		ok = true;
	}

	switch(ok){
		case true:
			break;
		case false:
			e.preventDefault();
			break;
		default:
			break;
	}
})