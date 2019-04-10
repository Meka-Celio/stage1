'use strict';

var btnCreateLigne = document.getElementById('addLigne');

btnCreateLigne.addEventListener('click', function(){

	var form = document.querySelector('#ligneForm');

	form.addEventListener('submit', function(e){

		var errorLibelle = document.getElementById('errorLigneLibelle');
		var errorMontant = document.querySelector('#errorLigneMontant');

		var regexLib	= /^[A-Z].[A-Za-z]+$/;
		var chiffre	= -1;

		var vLib 		= document.getElementById('libelle').value;
		var vMontant 	= document.getElementById('montant').value.trim();

		var ok = [];

		if (!regexLib.test(vLib))
			{
				errorLibelle.classList.add('alert', 'alert-danger');
				errorLibelle.innerHTML = "<li>Le nom doit commencer par une majuscule et contenir plus de deux caractères !</li>";
			}
		else{
				errorLibelle.classList.remove('alert', 'alert-danger');
				errorLibelle.innerHTML = "";
				ok.push(1);
		}

		var calc = vMontant * chiffre;
		if(isNaN(calc))
			{
				errorMontant.classList.add('alert', 'alert-danger');
				errorMontant.innerHTML = "<li>Le champ est vide ou n'est pas un nombre !</li>";
			}
		else{
				errorMontant.classList.remove('alert', 'alert-danger');
				errorMontant.innerHTML = "";
				ok.push(1);
		}

		console.log('Libelle : '+vLib+', Montant : '+vMontant);

		if (ok[0] != 1 && ok[1] != 1)
			{
				e.preventDefault();
			}
		else{

		}

	});
});
