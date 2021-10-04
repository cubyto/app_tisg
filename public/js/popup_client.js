var btnAbrirPopup_client = document.getElementById('btn-abrir-popup-client'),
    overlay_client = document.getElementById('overlay-client'),
    popup_client = document.getElementById('popup-client'),
    btnCerrarPopup_client = document.getElementById('btn-cerrar-popup-client');

btnAbrirPopup_client.addEventListener('click', function(){
    overlay_client.classList.add('active');
    popup_client.classList.add('active');
});

btnCerrarPopup_client.addEventListener('click', function(){
    overlay_client.classList.remove('active');
    popup_client.classList.remove('active');
});