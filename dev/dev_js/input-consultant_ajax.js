$(function () {
    $('#input-consultant').submit(function (e) {
        const postData = {
            Nombres: $('#NomConsultant').val(),
            Apellidos: $('#ApeConsultant').val(),
            Telefono: $('#PhoneConsultant').val(),
            Email: $('#EmailConsultant').val(),

            User: $('#UserConsultant').val(),
            Date: $('#DateConsultant').val(),
        };
        $.post('../dev/dev_php/Register_consultant.php', postData, function (response) {
            console.log(postData);
            alert(response);
            $('#btn-cerrar-popup-consultant').on('click', function () {
                $('#input-consultant').trigger('reset');
            });
            $('#input-consultant').trigger('reset');

        });
        e.preventDefault();
    });
});

