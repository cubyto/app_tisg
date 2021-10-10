$(function() { 
    let useritem  = $('#Useritem').text();
    gettabOrders()
    gettabOrderclients()
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
            alert(response);
            gettabOrders();
            gettabClient();
            gettabOrderclients();
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
    function gettabClient() {
        $.ajax({
            url: '../dev/dev_php/Get-tab_client.php',
            type: 'Post',
            data: { useritem }, 
            success: function (response) {
                let tabOrders = JSON.parse(response);
                let template = '';
                tabOrders.forEach(tabOrders => {
                    template += `
                        <tr>
                            <td>${tabOrders.id}</td>
                            <td>${tabOrders.Nombre}</td>
                            <td>${tabOrders.Telefono}</td>
                            <td>${tabOrders.Actitud}</td>
                            <td>${tabOrders.DateInsert_cli}</td>
                            <td>
                                <i class="btn-icon fas fa-edit"></i>
                            </td>
                            <td>
                                <i class="btn-icon fas fa-trash-alt"></i>
                            </td>
                        </tr>
                        <script> const dtCli = new DataTableCli('#dataTableCli', [{
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
    function gettabOrders() {
        let userOrder  = $('#Useritem').text();
        $.ajax({
            url: '../dev/dev_php/Get-tab_orders.php',
            type: 'Post',
            data: { userOrder }, 
            success: function (response) {
                let tabOrders = JSON.parse(response);
                let template = '';
                tabOrders.forEach(tabOrders => {
                    template += `
                        <tr>
                            <td>${tabOrders.id}</td>
                            <td>${tabOrders.Cliente}</td>
                            <td>${tabOrders.Producto}</td>
                            <td>${tabOrders.Code}</td>
                            <td>${tabOrders.Cantidad}</td>
                            <td>${tabOrders.Precio}</td>
                            <td>${tabOrders.Precio_ofert}</td>
                            <td>${tabOrders.Total}</td>
                            <td><span class="entregado"></span></td>
                            <td>${tabOrders.Fecha}</td>
                            <td>
                                <i class='btn-icon fas fa-edit'></i>
                            </td>
                            <td>
                                <i class='btn-icon fas fa-trash-alt'></i>
                            </td>
                            </tr>
                            <script>const dtPed = new DataTable('#dataTablePed', [{
                                id: 'btnShare',
                                text: 'Share',
                                icon: 'btn-share fas fa-share-alt'
                              }]);
                              dtPed.parse();</script>
                    `;
                });
                $('#tabOrders').html(template);
            }
        })
    }
    function gettabOrderclients() {
        let tabUser  = $('#Useritem').text();
        $.ajax({
            url: '../dev/dev_php/Get-tab_clientorders.php',
            type: 'Post',
            data: { tabUser },
            success: function (response) {
                let tabOrders = JSON.parse(response);
                let template = '';
                tabOrders.forEach(tabOrders => {
                    template += `
                        <tr>
                            <td>${tabOrders.id}</td>
                            <td>${tabOrders.Cliente}</td>
                            <td>${tabOrders.Telefono}</td>
                        </tr>
                        <script> const dtOrderCli = new DataTableOrderCli('#dataTableOrderCli', [{
                            id: 'btnShare',
                            text: 'Share',
                            icon: 'btn-share fas fa-share-alt'
                            }]);
                        dtOrderCli.parseOrderCli();</script>`
                });
                $('#tabClients-order').html(template);
            }
        })
    }
});