<?php
include 'Connect_DB.php';
//VERIFICACION DE LAS VARIABLES EN EL .html
if (isset($_POST["Cliente"]) && isset($_POST["Telefono"]) && isset($_POST["Actitud"]) && isset($_POST["User"]) && isset($_POST["Date"])) {
    //Definimos las variables
    //client VAR
    $Cliente  = $_POST['Cliente'];
    $Telefono = $_POST['Telefono'];
    $Actitud  = $_POST['Actitud'];

    $User     = $_POST['User'];
    
    $Date     = $_POST['Date'];
    date_default_timezone_set('UTC');
    $Datesqlformat = date("Y/m/d");
    
    $insertClient = false;

    //Verificamos si ya se inserto el cliente anteriormente
    $resClient = $mysql->query("SELECT * FROM Clientes WHERE 
            Nombre   = '$Cliente' AND
            UserCli  = '$User'
        ") or die($mysql->error);
    if (mysqli_num_rows($resClient) == 0) {
        //Si no se insertaron anteriormente los datos los insertaremos ahora
        $query = "INSERT INTO 
                Clientes (
                    Nombre, 
                    Telefono,
                    Actitud,
                    DateInsert_cli,
                    UserCli) 
                VALUES (
                    '" . $Cliente . "', 
                    '" . $Telefono . "', 
                    '" . $Actitud . "', 
                    '" . $Datesqlformat . "',
                    '" . $User . "')";
        //Verificamos si se inserto correctamente los datos
        $resultado = $mysql->query($query);
        $idClient = mysqli_insert_id($mysql);
        if ($resultado == true) {
            $insertClient = true;
        }
    } else {
        $ConsultSQL = mysqli_fetch_array($mysql->query("SELECT * FROM Clientes WHERE   
            Nombre   = '$Cliente' AND 
            Telefono = '$Telefono' AND 
            UserCli  = '$User'"));
        $DateSQL = str_replace('-', '/', date('d-m-Y', strtotime($ConsultSQL['DateInsert_cli'])));

        $insertClient = false;
        echo 'El cliente ya ha sido registrado el ' . $DateSQL . ', si desea cambiar alguna informacion, le recomenndamos editar en la tabla de "Clientes"';;
    }

    if ($insertClient == true) {
        echo 'Se registro correctamente el cliente hoy ' . $Date;
    }
}
