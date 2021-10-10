var btnAbrirTabclient = document.getElementById('btn-abrir-tabClient'),
  overlay_tabClient = document.getElementById('overlay-tabClient'),
  popup_tabClient = document.getElementById('tabclients'),
  btnCerrarTabclient = document.getElementById('btncloseContainClients');

btnAbrirTabclient.addEventListener('click', function(){
  overlay_tabClient.classList.add('active');
  popup_tabClient.classList.add('active');
});

btnCerrarTabclient.addEventListener('click', function(){
  overlay_tabClient.classList.remove('active');
  popup_tabClient.classList.remove('active');
});