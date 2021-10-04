var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
  overlay_order = document.getElementById('overlay-order'),
  popup_order = document.getElementById('popup-order'),
  btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
  overlay_order.classList.add('active');
  popup_order.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(){
  overlay_order.classList.remove('active');
  popup_order.classList.remove('active');
});