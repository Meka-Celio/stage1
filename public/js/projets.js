'use strict'

//////////////////////////////////////////
/////////// DONNEES  ////////////////////
////////////////////////////////////////

var updateForm	= document.getElementById('updateProjetForm'); 

////////////////////////////////////////// 
/////////// FONCTIONS  ////////////////// 
////////////////////////////////////////

//////////////////////////////////////////
/////////// MAIN  ////////////////////
////////////////////////////////////////

// FONCTION MODIFIER
updateForm.addEventListener('submit', function(e){

	var errorContainer	=	document.getElementById('ulErrorProjet');
	var textError		=	document.getElementById('liErrorProjet');
	var projetName		=	document.getElementById('projetName').value.trim();
	var projetNameInput =	document.getElementById('projetName');

	// Si projetName est différent de ""
	if (!projetName == ""){
		var ok = 1;
		if (errorContainer.classList.contains('alert','alert-danger')){
			errorContainer.classList.remove('alert', 'alert-danger');
			errorContainer.style.display = "none";
		}
		else{
			errorContainer.style.display = "none";
		}
	}
	else{
		var ok = 0;
		if (!errorContainer.classList.contains('alert','alert-danger')){
			errorContainer.classList.add('alert', 'alert-danger');
			errorContainer.style.display = "block";
			textError.innerHTML = "Ce champ ne doit pas être vide !";
			projetNameInput.focus();
		}
		else{
			errorContainer.style.display = "block";
			textError.innerHTML = "Ce champ ne doit pas être vide !";
			projetNameInput.focus();
		}
	}

	switch(ok){
		case 0:
			e.preventDefault();
			break;
		case 1:break;
		default:break;
	}
});

