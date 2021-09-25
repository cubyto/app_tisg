$(function() {
    //$('#btn-singin').submit(function(e) {
    //    const postData = {
    //        Nickname: $('#Username').val(),
    //        Password: $('#Pass').val(),
    //    };
    //    $.post('../dev/dev_php/User_confirm.php', postData, function //(response) {
    //        if(response == "sesion invalida") {
    //            swal.fire(response)
    //        }else {
    //            //href = '../../public/admin_dash.html';
    //            alert('response');
    //        };
    //    });
    //    e.preventDefault();
    //})

    $('#btn-singup').submit(function(e) {
        const postData = {
            Username: $('#Username').val(),
            Email: $('#Email').val(),
            Telefono: $('#Telefono').val(),
            Pass: $('#Pass').val(),
        };
        $.post('../dev/dev_php/Singup-register_DB.php', postData, function (response) {
            Swal.fire({
                icon: 'success',
                title: response,
            })
            $('#btn-singup').trigger('reset');
        });
        e.preventDefault();
    });
});