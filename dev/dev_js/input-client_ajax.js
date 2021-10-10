$(function () {
    gettabClient()
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
            gettabClient()
            alert(response);
            $('#btn-cerrar-popup-client').on('click', function () {
                $('#input-client').trigger('reset');
            });
            $('#input-client').trigger('reset');

        });
        e.preventDefault();
    });

    function gettabClient() {
        let useritem = $('#Useritem').text();
        $.ajax({
            url: '../dev/dev_php/Get-tab_client.php',
            type: 'Post',
            data: {
                useritem
            },
            success: function (response) {
                let tabClients = JSON.parse(response);
                let template = '';
                tabClients.forEach(tabClients => {
                    template += `
                        <tr>
                            <td>${tabClients.id}</td>
                            <td>${tabClients.Nombre}</td>
                            <td>${tabClients.Telefono}</td>
                            <td>${tabClients.Actitud}</td>
                            <td>${tabClients.DateInsert_cli}</td>
                            <td>
                                <i class="btn-icon fas fa-edit"></i>
                            </td>
                            <td>
                                <i class="btn-icon fas fa-trash-alt"></i>
                            </td>
                        </tr>
                        <script>const dtCli = new DataTableCli('#dataTableCli', [{
                            id: 'btnShare',
                            text: 'Share',
                            icon: 'btn-share fas fa-share-alt'
                            }]);
                        dtCli.parseCli();</script>`
                });
                $('#tabClients').html(template);
            }
        })
    }

});