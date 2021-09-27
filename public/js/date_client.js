(function(){
    var actualizarHora =function(){
      var fecha = new Date(),
          dia  = fecha.getDate(),
          mes  = fecha.getMonth(),
          año  = fecha.getFullYear();
  
      var cliDia  = document.getElementById('diaClient'), 
          cliMes  = document.getElementById('mesClient'),
          cliAño  = document.getElementById('añoClient')
      cliDia.textContent = dia;

      var meses = ['01', '02', '03', '04', '05', '06', '07', '08',  '09', '10', '11',  '12'];
      
      cliMes.textContent = meses[mes];
  
      cliAño.textContent = año;

    };
  
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
  
}());