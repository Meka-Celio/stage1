'use strict';

// Modal de projet

function showModalProjet()
{
	var modalProjet = document.getElementById('modalProjet');
	modalProjet.style.display = "block";
}

function closeModalProjet()
{	
	var errorPName = document.getElementById('projetName');
	var modalProjet = document.getElementById('modalProjet');

	errorPName.innerHTML = "";
	errorPName.classList.remove('alert', 'alert-danger');
	modalProjet.style.display = 'none';
}

// Fin modal projet