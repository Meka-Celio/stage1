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

// Modal Rubrique
function showModalRubrique()
{
	var modal = document.querySelector('.modal-container');
	modal.style.display = 'block';
}

function closeModalRubrique()
{
	var modal = document.querySelector('.modal-container');
	modal.style.display = 'none';
}
// Fin Modal rubrique

// Modal Ligne
function showModalLigne()
{
	var modal = document.querySelector('.modal-container');
	modal.style.display = 'block';
}

function closeModalLigne()
{
	var modal = document.querySelector('.modal-container');
	modal.style.display = 'none';
}
// Fin modal ligne