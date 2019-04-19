'use strict';

var nbr_projets = document.querySelectorAll('.projet_row');
var affiches	= document.querySelectorAll('.affiche');

for (var c=0; c<nbr_projets.length; c++)
	{
		var aff = affiches[c];
		aff.innerHTML = c+1;
	}