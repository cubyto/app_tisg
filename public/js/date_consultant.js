(function(){
    var actualizarHora =function(){
      var fecha = new Date(),
          dia  = fecha.getDate(),
          mes  = fecha.getMonth(),
          año  = fecha.getFullYear();
  
      var conDia  = document.getElementById('diaconsultant'), 
          conMes  = document.getElementById('mesconsultant'),
          conAño  = document.getElementById('añoconsultant')
      conDia.textContent = dia;

      var meses = ['01', '02', '03', '04', '05', '06', '07', '08',  '09', '10', '11',  '12'];
      
      conMes.textContent = meses[mes];
  
      conAño.textContent = año;

    };
  
    actualizarHora();
    var intervalo = setInterval(actualizarHora, 1000)
  
}());