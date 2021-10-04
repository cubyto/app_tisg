var btnAbrirPopup_consultant = document.getElementById('btn-abrir-popup-consultant'),
    overlay_consultant = document.getElementById('overlay-consultant'),
    popup_consultant = document.getElementById('popup-consultant'),
    btnCerrarPopup_consultant = document.getElementById('btn-cerrar-popup-consultant');

btnAbrirPopup_consultant.addEventListener('click', function(){
    overlay_consultant.classList.add('active');
    popup_consultant.classList.add('active');
});

btnCerrarPopup_consultant.addEventListener('click', function(){
    overlay_consultant.classList.remove('active');
    popup_consultant.classList.remove('active');
});