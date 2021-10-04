$(function() {
    $('#input-order').submit(function(e) {
        const postData = {
            Cliente: $('#Cliente').val(),
            Telefono: $('#Telefono').val(),
            Actitud: $('#Actitud').val(),

            Producto: $('#Producto').val(),
            Codigo: $('#Codigo').val(),
            Cantidad: $('#Cantidad').val(),
            Precio: $('#Precio').val(),
            Precioofert: $('#Priceofert').val(),

            User: $('#User').val(),
            Date: $('#Date').val(),
        };
        $.post('../dev/dev_php/Register-order.php', postData, function (response) {
            console.log(postData);
            alert(response);
            $('#btn-cerrar-popup').on('click', function() {
                $('#input-order').trigger('reset');
            });
            $('#Producto').val(null),
            $('#Codigo').val(null),
            $('#Cantidad').val(null),
            $('#Precio').val(null)
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
                    $('#overlay-order').removeClass('active');
                    $('#popup-order').removeClass('active')
                    $('#input-order').trigger('reset');
                    
                }else if(result.isDenied) {
                    $('#overlay-order').addClass('active');
                    $('#popup-order').addClass('active')
                }
            });
        });
    });
});