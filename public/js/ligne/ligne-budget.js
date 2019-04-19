'use strict';

// //////////////// MAIN ///////////////////
var form = document.querySelector('#ligneFormulaire');

	form.addEventListener('submit', function(e){
		
		var errorLibelle = document.getElementById('errorLigneLibelle');
		var errorMontant = document.querySelector('#errorLigneMontant');

		var regexLib	= /^[A-Z].[A-Za-z]+$/;
		var chiffre	= -1;

		var vLib 		= document.querySelector('#libelle').value.trim();
		var vMontant 	= document.getElementById('montant').value.trim();

		var ok1 = false;
		var ok2 = false;

		if (!regexLib.test(vLib))
			{
				errorLibelle.classList.add('alert', 'alert-danger');
				errorLibelle.innerHTML = "<li>Le nom doit commencer par une majuscule, et avoir au moins 3 caractères !</li>";
			}
		else{
				errorLibelle.classList.remove('alert', 'alert-danger');
				errorLibelle.innerHTML = "";
				ok1 = true;
		}
		var calc = vMontant * chiffre;
		if(isNaN(calc))
			{
				errorMontant.classList.add('alert', 'alert-danger');
				errorMontant.innerHTML = "<li>Le champ est vide ou n'est pas un nombre !</li>";
			}
		else{
				
				if (vMontant < 1)
				{
					errorMontant.classList.add('alert', 'alert-danger');
					errorMontant.innerHTML = "<li>Le champ doit être supérieur ou égale à 1 !</li>";
				}
				else{
					errorMontant.classList.remove('alert', 'alert-danger');
					errorMontant.innerHTML = "";
					ok2 = true;
				}
		}

		if (!ok1 == false && !ok2 == false)
		{

		}
		else{
			e.preventDefault();
		}

	});

