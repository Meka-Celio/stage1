'use strict'

var nbr_projets = document.querySelectorAll('.rubrique_row');
var affiches	= document.querySelectorAll('.affiche-r');

for (var c=0; c<nbr_projets.length; c++)
	{
		var aff = affiches[c];
		console.log(aff);
		aff.innerHTML = c+1;
	}