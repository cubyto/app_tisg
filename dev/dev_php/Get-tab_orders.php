<?php
    include 'Connect_DB.php';
    $item = $_POST['userOrder'];
    $User = strtok($item, "\n            ");
    $query = "SELECT pedidos.id, pedidos.idClientes,  productos.Producto, productos.Code, pedidos.Cantidad,  productos.Precio,  productos.Precio_ofert, pedidos.Total, pedidos.Estado, pedidos.Fecha FROM pedidos INNER JOIN productos ON pedidos.idProducto = productos.id WHERE UserPed = '$User'";
    $result = mysqli_query($mysql, $query);

    if(!$result) {
        die('La consulta ha fallado'. mysqli_error($mysql));
    }
    
    $json = [];
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'Cliente' => $row['idClientes'],
            'Producto' => $row['Producto'],
            'Code' => $row['Code'],
            'Cantidad' => $row['Cantidad'],
            'Precio' => $row['Precio'],
            'Precio_ofert' => $row['Precio_ofert'],
            'Total' => $row['Total'],
            'Estado' => $row['Estado'],
            'Fecha' => str_replace('-', '/', date('d-m-Y', strtotime($row['Fecha'])))
        );
    };
    $jsonString = json_encode($json);
    if($jsonString != '') {
        echo $jsonString;
    }