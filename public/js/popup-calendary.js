var btnAbrirCalendary = document.getElementById('btn-abrir-calendary'),
  overlay_calendary = document.getElementById('overlay-calendary'),
  popup_calendary = document.getElementById('calendary'),
  btnCerrarCalendary = document.getElementById('btn-cerrar-calendary');

btnAbrirCalendary.addEventListener('click', function(){
  overlay_calendary.classList.add('active');
  popup_calendary.classList.add('dark');
});

btnCerrarCalendary.addEventListener('click', function(){
  overlay_calendary.classList.remove('active');
  popup_calendary.classList.remove('dark');
});