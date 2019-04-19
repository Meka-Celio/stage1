'use strict'

// ---------MAIN-----------//

var form  = document.getElementById('depenseForm');

form.addEventListener('submit', function(e){

	var Vnom 		= document.getElementById('Vnom').value.trim();
	var Vcout   	= document.getElementById('Vcout').value.trim();
	var errorNom 	= document.getElementById('errorNom');
	var errorCout	= document.getElementById('errorCout');
	var ok0 = 0;
	var ok1 = 0;

	if (Vnom == "")
		{
			errorNom.classList.add('alert', 'alert-danger');
			errorNom.innerHTML = 'Ce champ ne doit pas être vide !';
			ok0 = 0;
		}
	else{
			errorNom.classList.remove('alert', 'alert-danger');
			errorNom.innerHTML = '';
			ok0 = 1;
	}

	if (Vcout == "")
		{
			errorCout.classList.add('alert', 'alert-danger');
			errorCout.innerHTML = 'Ce champ ne doit pas être vide !';
			ok1 = 0;
		}
	else{
		if (Vcout <= 0)
			{
				errorCout.classList.add('alert', 'alert-danger');
				errorCout.innerHTML = 'Le cout doit être superieur à 0';
				ok1 = 0;
			}
		else{
			errorCout.classList.remove('alert', 'alert-danger');
			errorCout.innerHTML = '';
			ok1 = 1;
		}
	}

	e.preventDefault();
})