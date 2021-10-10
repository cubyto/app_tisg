<?php
    include 'Connect_DB.php';
    $item = $_POST['useritem'];
    $User = strtok($item, "\n            ");
    $query = "SELECT * FROM Clientes WHERE UserCli = '$User'";
    $result = mysqli_query($mysql, $query);

    if(!$result) {
        die('La onsulta ha fallado'. mysqli_error($mysql));
    }
    $json = [];
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'Nombre' => $row['Nombre'],
            'Telefono' => $row['Telefono'],
            'Actitud' => $row['Actitud'],
            'DateInsert_cli' => str_replace('-', '/', date('d-m-Y', strtotime($row['DateInsert_cli'])))
        );
    }
    $jsonString = json_encode($json);
    if($jsonString != '') {
        echo $jsonString;
    }