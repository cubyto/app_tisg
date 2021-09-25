var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
  overlay = document.getElementById('overlay'),
  popup = document.getElementById('popup'),
  btnCerrarPopup = document.getElementById('btn-cerrar-popup');
  forminput = document.getElementById('input-order').onsubmit;

btnAbrirPopup.addEventListener('click', function(){
  overlay.classList.add('active');
  popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(){
    overlay.classList.remove('active');
    popup.classList.remove('active');
});