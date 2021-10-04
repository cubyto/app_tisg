function autocompletar() {
    const inputConsultant = document.querySelector('#NomConsultant');
    let indexFocus = -1;

    inputConsultant.addEventListener('input', function () {
        const NomConsultant = this.value;

        if (!NomConsultant) return false;

        cerrarLista();

        //Crear la lista de sugerencias
        const divList = document.createElement('div')
        divList.setAttribute('id', this.id + '-lista-autocompletar')
        divList.setAttribute('class', 'lista-autocomplete-items');
        this.parentNode.appendChild(divList);

        //conexion a base de DATOS
        httpRequest('../dev/dev_php/Autocomplete-consultant.php?NomConsult=' + NomConsultant, function(){

            const arreglo = JSON.parse(this.response);

            //validar arreglo VS inputConsultant
            if (arreglo.length == 0) return false;
            arreglo.forEach(item => {
                if (item.substr(0, NomConsultant.length) == NomConsultant) {
                    const elementoLista = document.createElement('div');
                    elementoLista.innerHTML = `<strong>${item.substr(0, NomConsultant.length)}</strong>${item.substr(NomConsultant.length)}`;
                    elementoLista.addEventListener('click', function () {
                        inputConsultant.value = this.innerText;
                        cerrarLista();
                        return false
                    })
                    divList.appendChild(elementoLista);
                }
            });
        });

        
 
    });

    inputConsultant.addEventListener("keydown", function (e) {
        const divList = document.querySelector('#' + this.id + '-lista-autocompletar')
        let items;

        if (divList) {
            items = divList.querySelectorAll('div');

            switch (e.keyCode) {
                case 40: //tecla flecha abajo
                    indexFocus++;
                    if (indexFocus > items.lenght-1) indexFocus = items.lenght - 1;
                    break;

                case 38: //tecla flecha arriba
                    indexFocus--;
                    if (indexFocus < 0) indexFocus = 0;
                    break;

                case 13: //tecla flecha entere
                    e.preventDefault();
                    items[indexFocus].click();
                    indexFocus = -1;
                    break;

                default:
                    break;
            }

            seleccionar(items, indexFocus);
            return false;
        }
    });
    document.addEventListener('click', function () {
        cerrarLista();
    })
}

function seleccionar(items, indexFocus) {
    if (!items || indexFocus == -1) return false;
    items.forEach(x => {
        x.classList.remove('autocomplete-active')
    });
    items[indexFocus].classList.add('autocomplete-active');
}

function cerrarLista() {
    const items = document.querySelectorAll('.lista-autocomplete-items')
    items.forEach(item => {
        item.parentNode.removeChild(item);
    });
    indexFocus = -1;
}

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}
autocompletar();