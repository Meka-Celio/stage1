'use strict'

function validateRubriqueForm()
{
	var Vcode		= document.getElementById('code').value;
	var Vlibelle 	= document.getElementById('libelle').value;

	var Pcode 		= document.getElementById('spaceErrorCode');
	var Plibelle	= document.getElementById('spaceErrorLibelle');

	let codeFormat 		= /^[A-Z].[0-9A-Z]+$/;
	let libelleFormat 	= /^[A-Z].[a-z ]+$/;

	let validation = [0, 0]; 

	if (!codeFormat.test(Vcode))
		{
			validation[0] = 0;
			if (!Pcode.classList.contains('alert','alert-danger')){
				Pcode.classList.add('alert', 'alert-danger');
				Pcode.style.display = 'block';
				let msgErrorCode = document.createTextNode('Le code doit être uniquement en majuscule !');
				Pcode.appendChild(msgErrorCode);
			}
		}
	else 
		{
			validation[0] = 1;
			if (Pcode.classList.contains('alert','alert-danger')){
				Pcode.classList.remove('alert', 'alert-danger');
				Pcode.style.display = 'none';
			}
		}
	if (!libelleFormat.test(Vlibelle))
		{
			validation[1] = 0;
			if (!Plibelle.classList.contains('alert', 'alert-danger')){
				Plibelle.classList.add('alert','alert-danger');
				Plibelle.style.display = 'block';
				let msgErrorLib = document.createTextNode('Le nom doit commencer par une majuscule');
				Plibelle.appendChild(msgErrorLib);
			}
		}
	else 
		{
			validation[1] = 1;
			if (Plibelle.classList.contains('alert', 'alert-danger')){
				Plibelle.classList.remove('alert','alert-danger');
				Plibelle.style.display = 'none';
			}
		}

	return validation;
}


var form = document.getElementById('rubriqueForm');

console.log(form);

form.addEventListener('submit', function(e){

	var validation = validateRubriqueForm();

	if (validation[0] != 0 && validation[1] != 0){
		
	}
	else{
		e.preventDefault();
	}

});