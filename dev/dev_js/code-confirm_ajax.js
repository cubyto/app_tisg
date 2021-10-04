$(function() {
    $('#auth-form').submit(function(e) {
        const postData = {
            Codigo: $('#Codigo').val(),
            Email: $('#Email').val(),
        };
        $.post('../dev/dev_php/Code_confirm.php', postData, function (response) {
            if(response === "Codigo invalido") {
                Swal.fire({
                    icon: 'error',
                    title: response,
                })
            }else {
                Swal.fire({
                icon: 'success',
                html: '<h2 class="negro">SE HA VERIFICADO LOS DATOS</h2><br></br><p class="subtitle">puedes dar click en "LOG IN" para loguearte</p><br></br><a class="link" href="http://127.0.0.1/apptisg/public/login.html">Log in</a>',
            })};
        });
        e.preventDefault();
    });
});