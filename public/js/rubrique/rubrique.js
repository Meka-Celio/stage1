'use strict'

// ///////////////// Main ///////////////////////////
var form = document.getElementById('rubriqueForm');

form.addEventListener('submit', function(e){

	var Vcode		= document.getElementById('code').value.trim();
	var Vlibelle 	= document.getElementById('libelle').value.trim();

	var errorCode 		= document.getElementById('errorCode');
	var errorLib	= document.getElementById('errorLib');

	var codeFormat 		= /^RUB[0-9A-Z]+$/;
	var libelleFormat 	= /^[A-Z].[a-z ]+$/;

	var ok1 = false;
	var ok2 = false;

	// Si code  == ""
	if (Vcode == "")
		{
			errorCode.classList.add('alert', 'alert-danger');
			errorCode.innerHTML = 'Le champ ne doit pas être vide !';
			
		}
	else 
		{
			// Si code ne respecte pas le format
			if (!codeFormat.test(Vcode))
				{
					errorCode.classList.add('alert', 'alert-danger');
					errorCode.innerHTML = 'Le champ doit commencé par RUB... !';
					
				}
			else 
				{
					errorCode.classList.remove('alert', 'alert-danger');
					errorCode.innerHTML = "";
					ok1 = true;
				}
		}

	if (Vlibelle == "")
		{
			errorLib.classList.add('alert', 'alert-danger');
			errorLib.innerHTML = 'Le champ ne doit pas être vide !';
			
		}
	else 
		{
			// Si le format n'est pas respecté
			if (!libelleFormat.test(Vlibelle))
				{
					errorLib.classList.add('alert', 'alert-danger');
					errorLib.innerHTML = 'Format non respecté, doit commencer par une majuscule et au moins 2 lettres !';
					
				}
			else
				{
					errorLib.classList.remove('alert', 'alert-danger');
					errorLib.innerHTML = "";
					ok2 = true;
				}
		}

	if (ok1 != true || ok2 != true){
		e.preventDefault();
	}
	else{

	}

});
