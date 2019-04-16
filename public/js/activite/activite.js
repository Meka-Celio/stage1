'use strict'

function valideForm(){
	var form = document.getElementById('activiteForm');
	form.addEventListener('submit', function(e){
		
		var blockError 	= 	document.getElementById('errorNameActivite');
		var txtError	=	document.querySelector('#errorNameActivite li');
		var vnom		=	document.getElementById('nom').value;
		var ok = 0;
		var regexNom	=	/^[a-zA-Z]+$/;
		var Vnom = vnom.trim(); 

		if (!regexNom.test(Vnom)){
			blockError.classList.add('alert', 'alert-danger');
			txtError.innerHTML = "Ce champ ne doit pas être vide et ne doit contenir que des lettres !";
			blockError.style.display = "block";
		}
		else{
			ok = 1;
			blockError.classList.remove('alert', 'alert-danger');
			txtError.innerHTML = "";
			blockError.style.display = "none";
		}

		if (!ok == 0){}
		else{
			e.preventDefault();
		}
	});
}

/////////////////////// Main //////////////////////////

var btnModal = document.getElementById('showModal');
btnModal.addEventListener('click', valideForm);