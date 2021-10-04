function autocompletar() {
    const inputProduct = document.querySelector('#Producto');
    let indexFocus = -1;

    inputProduct.addEventListener('input', function () {
        const Producto = this.value;

        if (!Producto) return false;

        cerrarLista();

        //Crear la lista de sugerencias
        const divList = document.createElement('div')
        divList.setAttribute('id', this.id + '-lista-autocompletar')
        divList.setAttribute('class', 'lista-autocomplete-items');
        this.parentNode.appendChild(divList);

        //conexion a base de DATOS
        httpRequest('../dev/dev_php/Automplete-producto_name.php?Producto=' + Producto, function(){

            const arreglo = JSON.parse(this.response);

            //validar arreglo VS inputProduct
            if (arreglo.length == 0) return false;
            arreglo.forEach(item => {
                if (item.substr(0, Producto.length) == Producto) {
                    const elementoLista = document.createElement('div');
                    elementoLista.innerHTML = `<strong>${item.substr(0, Producto.length)}</strong>${item.substr(Producto.length)}`;
                    elementoLista.addEventListener('click', function () {
                        inputProduct.value = this.innerText;
                        cerrarLista();
                        return false
                    })
                    divList.appendChild(elementoLista);
                }
            });
        });

        
 
    });

    inputProduct.addEventListener("keydown", function (e) {
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