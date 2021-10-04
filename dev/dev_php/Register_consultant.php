<?php
include 'Connect_DB.php';
//VERIFICACION DE LAS VARIABLES EN EL .html
if (isset($_POST["Nombres"]) && isset($_POST["Apellidos"]) && isset($_POST["Telefono"]) && isset($_POST["Email"]) && isset($_POST["User"]) && isset($_POST["Date"])) {
    //Definimos las variables
    //client VAR
    $Nombres  = $_POST['Nombres'];
    $Apellidos  = $_POST['Apellidos'];
    $Telefono = $_POST['Telefono'];
    $Email  = $_POST['Email'];

    $User     = $_POST['User'];
    
    $Date     = $_POST['Date'];
    date_default_timezone_set('UTC');
    $Datesqlformat = date("Y/m/d");

    $insertConsult = false;

    //Verificamos si ya se inserto el cliente anteriormente
    $resConsult = $mysql->query("SELECT * FROM Consultoras WHERE 
            Nombres   = '$Nombres' AND
            Apellidos = '$Apellidos' AND
            Telefono  = '$Telefono'
        ") or die($mysql->error);
    if (mysqli_num_rows($resConsult) == 0) {
        //Si no se insertaron anteriormente los datos los insertaremos ahora
        $query = "INSERT INTO 
                consultoras (
                    Nombres, 
                    Apellidos, 
                    Telefono,
                    Email,
                    DateInsert_con) 
                VALUES (
                    '" . $Nombres . "', 
                    '" . $Apellidos . "', 
                    '" . $Telefono . "', 
                    '" . $Email . "',
                    '" . $Datesqlformat . "')";
        //Verificamos si se inserto correctamente los datos
        $resultado = $mysql->query($query);
        if ($resultado == true) {
            $insertConsult = true;
        } else {
            echo 'no se logro insertar la consultora';
        }
    } else {
        $insertConsult = false;
        $ConsultSQL = mysqli_fetch_array($mysql->query("SELECT * FROM Consultoras WHERE 
            Nombres   = '$Nombres' AND 
            Apellidos = '$Apellidos' AND 
            Telefono  = '$Telefono'"));
        $DateSQL = str_replace('-', '/', date('d-m-Y', strtotime($ConsultSQL['DateInsert_con'])));
        echo 'La consultora ya ha sido registrada el ' . $DateSQL . ', si desea cambiar alguna informacion, le recomenndamos editar en la tabla de "Consultoras"';
    }

    if ($insertConsult == true) {
        echo 'Se registro correctamente la consultora hoy ' . $Date;
    }
}
