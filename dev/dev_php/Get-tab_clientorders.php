<?php
    include 'Connect_DB.php';
    $item = $_POST['tabUser'];
    $User = strtok($item, "\n            ");
    $query = "SELECT clientes.id, clientes.Nombre, clientes.Telefono FROM pedidos INNER JOIN clientes ON pedidos.idClientes = clientes.id WHERE UserPed = '$User'";
    $result = mysqli_query($mysql, $query);

    if(!$result) {
        die('La onsulta ha fallado'. mysqli_error($mysql));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'Cliente' => $row['Nombre'],
            'Telefono' => $row['Telefono'],
        );
    }
    $jsonString = json_encode($json);
    if($jsonString != '') {
        echo $jsonString;
        //echo json_encode($item);
        //echo json_encode($User);
    }