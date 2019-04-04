'use strict';


function resetValue(form)
{
	document.form.reset();
}

function showNewUserModal()
{
	var modal = document.getElementById('createUserModal');
	modal.style.top = "40px";
	var newUser = true;
}

function closeNewUserModal()
{
	var modal = document.getElementById('createUserModal');
	modal.style.top = "-800px";
	var newUser = false;
}

function showDeleteUserModal()
{
	var modal = document.getElementById('deleteUserModal');
	modal.style.bottom = "35%";
}

function valideDelete(html)
{
	var ouinon = html.getAttribute('value');
	
	if (ouinon == 'non')
		{
			var modal = document.getElementById('deleteUserModal');
			modal.style.bottom = "-600px";
		}
}

function showDeleteProjetModal()
{
	var modal = document.getElementById('deleteProjetModal');
	modal.style.display = "block";
}

function closeDeleteProjetModal()
{
	var modal = document.getElementById('deleteProjetModal');
	modal.style.display = "none";
}

function showCreateRubriqueModal()
{
	var modal = document.getElementById('createNewRubrique');
	modal.style.display = 'block';
}

function closeRubriqueModal()
{
	var modal = document.getElementById('createNewRubrique');
	modal.style.display = 'none';
}