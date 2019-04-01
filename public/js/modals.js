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

