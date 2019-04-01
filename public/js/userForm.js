'use strict'

function valideName()
{
	var inputName = document.getElementById('name');
	var valName = inputName.value;
	var regexName 	= /^[A-Z]+[A-Z a-z]+$/;
	var msgErrorName = document.getElementById('divErrorName');
	var txt = "Que des lettres s'il vous plait et la premiere en majuscule!";
	var res = 0;

	if (!regexName.test(valName)){

		msgErrorName.classList.add('alert', 'alert-warning');
		msgErrorName.innerHTML = txt;
		res = 0;
	}
	else {

		msgErrorName.classList.remove('alert', 'alert-warning');
		msgErrorName.innerHTML = "";
		res = 1;
	}

	return res;
}

function valideEmail()
{

	var valEmail = document.getElementById('email').value;
	var regexEmail 	= /^[a-zA-Z0-9]+[@].[a-z .]+$/; 
	var msgErrorEmail = document.getElementById('divErrorMail');
	var txt = "Respectez le format Email !!";
	var res = 0;

	if (!regexEmail.test(valEmail)){

		msgErrorEmail.classList.add('alert', 'alert-warning');
		msgErrorEmail.innerHTML = txt;
		res = 0;
	}
	else {

		msgErrorEmail.classList.remove('alert', 'alert-warning');
		msgErrorEmail.innerHTML = "";
		res = 1;
	}

	return res;
}

function validePassword()
{

	var valPassword	= document.getElementById('password').value;
	var msgErrorPassword = document.getElementById('divErrorPassword');
	var txt = "Le mot de passe doit contenir au moin 6 caractères !";
	var res = 0;

	if (valPassword.trim().length >= 6){

		msgErrorPassword.innerHTML = "";
		msgErrorPassword.classList.remove('alert', 'alert-warning');
		res = 1;
	}
	else{
		msgErrorPassword.innerHTML = txt;
		msgErrorPassword.classList.add('alert', 'alert-warning');
		res = 0;
	}

	console.log(res);
	return res;
}

function validationForm(form)
{
	
}

