$(function () {
    $('#input-client').submit(function (e) {
        const postData = {
            Cliente: $('#NomClient').val(),
            Telefono: $('#PhoneClient').val(),
            Actitud: $('#ActClient').val(),
            
            User: $('#User').val(),
            Date: $('#DateTime').val(),
        };
        console.log(postData);
        $.post('../dev/dev_php/Register_client.php', postData, function (response) {
            console.log(postData);
            console.log(response);
            alert(response);
            $('#btn-cerrar-popup-client').on('click', function () {
                $('#input-client').trigger('reset');
            });
            $('#input-client').trigger('reset');

        });
        e.preventDefault();
    });
});