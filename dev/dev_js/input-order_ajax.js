$(function() {
    $('#input-order').submit(function(e) {

        const f = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'PEN',
            minimumFractionDigits:2
        })
        const postData = {
            Cliente: $('#Cliente').val(),
            Telefono: $('#Telefono').val(),
            Actitud: $('#Actitud').val(),

            Producto: $('#Producto').val(),
            Codigo: $('#Codigo').val(),
            Cantidad: $('#Cantidad').val(),
            Precio: $('#Precio').val(),
            //Precio: f.format($('#Precio').val()),
            User: $('#User').val(),
            Date: $('#Date').val(),
        };
        $.post('../dev/dev_php/Register-order.php', postData, function (response) {
            console.log(postData);
            alert(response);
            $('#btn-cerrar-popup').on('click', function() {
                //$('#input-order').trigger('reset');
                //alert('se envio la data')
            });
            $('#Producto').val(null),
            $('#Codigo').val(null),
            $('#Cantidad').val(null),
            $('#Precio').val(null),
            $('#User').val(null)
        });
        e.preventDefault();
    });
    $('#input-order').keyup(function() {
        $('#btn-cerrar-popup').on('click', function() {
            swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "The data entered in the form, will be completely deleted!",
                showDenyButton: true,
                denyButtonColor: '#d33',
                denyButtonText: 'Cancel',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete all!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#overlay').removeClass('active');
                    $('#popup').removeClass('active')
                    $('#input-order').trigger('reset');
                    
                }else if(result.isDenied) {
                    $('#overlay').addClass('active');
                    $('#popup').addClass('active')
                }
            });
        });
    });
});