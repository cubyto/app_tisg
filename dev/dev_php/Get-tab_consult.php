<?php
    include 'Connect_DB.php';
    $item = $_POST['useritem'];
    $User = strtok($item, "\n            ");
    $query = "SELECT * FROM consultoras WHERE UserCon = '$User'";
    $result = mysqli_query($mysql, $query);

    if(!$result) {
        die('La onsulta ha fallado'. mysqli_error($mysql));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id' => $row['id'],
            'Nombres' => $row['Nombres'],
            'Apellidos' => $row['Apellidos'],
            'Telefono' => $row['Telefono'],
            'Email' => $row['Email'],
            'DateInsert_con' => str_replace('-', '/', date('d-m-Y', strtotime($row['DateInsert_con'])))
        );
    }
    $jsonString = json_encode($json);
    if($jsonString != '') {
        echo $jsonString;
        //echo json_encode($item);
        //echo json_encode($User);
    }