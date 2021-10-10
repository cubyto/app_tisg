$(function () { 
    gettabConsult()
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
            gettabConsult()
            alert(response);
            $('#btn-cerrar-popup-consultant').on('click', function () {
                $('#input-consultant').trigger('reset');
            });
            $('#input-consultant').trigger('reset');

        });
        e.preventDefault();
    });

    function gettabConsult() {
        let useritem = $('#Useritem').text();
        $.ajax({
            url: '../dev/dev_php/Get-tab_consult.php',
            type: 'POST',
            data: {
                useritem
            },
            success: function (response) {
                let tabConsult = JSON.parse(response);
                let template = '';
                tabConsult.forEach(tabConsult => {
                    template += `
                        <tr>
                            <td>${tabConsult.id}</td>
                            <td>${tabConsult.Nombres}</td>
                            <td>${tabConsult.Apellidos}</td>
                            <td>${tabConsult.Telefono}</td>
                            <td>${tabConsult.Email}</td>
                            <td><span class="entregado"></span></td>
                            <td>${tabConsult.DateInsert_con}</td>
                            <td>
                                <i class="btn-icon fas fa-edit"></i>
                            </td>
                            <td>
                                <i class="btn-icon fas fa-trash-alt"></i>
                            </td>
                        </tr>
                        <script>const dtCon = new DataTableCon('#dataTableCon', [{
                            id: 'btnShare',
                            text: 'Share',
                            icon: 'btn-share fas fa-share-alt'
                            }]);
                        dtCon.parseCon();</script>`
                });
                $('#tabConsult').html(template);
            }
        })
        console.log(useritem);
    }
    
});