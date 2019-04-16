'use strict';

var updateForm = document.getElementById('editRubriqueForm');

console.log(updateForm);
updateForm.addEventListener('submit', function(e){
    var lib = document.getElementById('libelle').value.trim() ;
    var errorBlock = document.getElementById('errorLib');
    var reg = /^[a-zA-Z]+$/;
    var ok =false;

    if (lib == "")
    {
        errorBlock.classList.add('alert', 'alert-danger');
        errorBlock.innerHTML = "<li>Ce champ est requis ! </li>";
        ok = false;
    }
    else{
        if (!reg.test(lib))
    {
        errorBlock.classList.add('alert', 'alert-danger');
        errorBlock.innerHTML = "<li>Ce champ ne doit contenir que des lettres ! </li>";
        ok = false;
    }
    else{
        errorBlock.classList.remove('alert', 'alert-danger');
        errorBlock.innerHTML = "";
        ok = true;
    }
    }

    

    if (ok != false)
    {

    }else{
        e.preventDefault();
    }
});