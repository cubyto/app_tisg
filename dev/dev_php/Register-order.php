<?php
include 'Connect_DB.php';
//VERIFICACION DE LAS VARIABLES EN EL .html
if (isset($_POST["Cliente"]) && isset($_POST["Telefono"]) && isset($_POST["Actitud"]) && isset($_POST["Producto"]) && isset($_POST["Codigo"]) && isset($_POST["Cantidad"]) && isset($_POST["Precio"]) && isset($_POST["Precioofert"]) && isset($_POST["User"]) && isset($_POST["Date"])) {
    //Definimos las variables
    //client VAR
    $Cliente  = $_POST['Cliente'];
    $Telefono = $_POST['Telefono'];
    $Actitud  = $_POST['Actitud'];
    $User     = $_POST['User'];

    //product VAR
    $Producto = $_POST['Producto'];
    $Codigo   = $_POST['Codigo'];
    $Precio   = $_POST['Precio'];
    $Oferta   = $_POST['Precioofert'];

    //pedidos VAR
    $Cantidad = $_POST['Cantidad'];
    $Date     = $_POST['Date'];
    date_default_timezone_set('UTC');
    $Datesqlformat = date("Y/m/d");
    $Priceend = '';
    if($Oferta != '') {
        $Pricend = $Oferta;
        
    }else {
        $Pricend = $Precio;
    }
    $Totalprice = $Pricend*$Cantidad;
    
    $idClient = "";
    $idProd = "";


    $insertClient = false;
    $insertProduct = false;

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
        $insertClient = true;
        $ConsultCliSQL = mysqli_fetch_array($mysql->query("SELECT * FROM Clientes WHERE 
            Nombre = '$Cliente' AND 
            Telefono = '$Telefono' AND 
            UserCli = '$User'"));
        
        $idClient = $ConsultCliSQL['id'];
    }

    //Verificamos si ya se inserto el producto anteriormente
    $resProduct = $mysql->query("SELECT * FROM Productos WHERE 
            Producto = '$Producto' AND
            Code     = '$Codigo'
        ") or die($mysql->error);
    if (mysqli_num_rows($resProduct) == 0) {
        //Si no se insertaron anteriormente los datos los insertaremos ahora
        $query = "INSERT INTO 
                Productos (
                    Producto,
                    Code,    
                    Precio,
                    Precio_ofert,
                    DateInsert_prod)
                VALUES (
                    '" . $Producto . "', 
                    '" . $Codigo . "', 
                    '" . $Precio . "', 
                    '" . $Oferta . "',
                    '" . $Datesqlformat . "')";
        //Verificamos si se inserto correctamente los datos
        $resultado = $mysql->query($query);
        $idProd = mysqli_insert_id($mysql);
        if ($resultado == true) {
            $insertProduct = true;
        }
    } else {
        $insertProduct = true;
        $ConsultConSQL = mysqli_fetch_array($mysql->query("SELECT * FROM Productos WHERE 
            Producto = '$Producto' AND
            Code     = '$Codigo'"));
        
        $idProd = $ConsultConSQL['id'];
    }

    if ($insertClient and $insertProduct == true) {
        $query = "INSERT INTO 
                Pedidos (
                    idClientes,
                    Fecha,    
                    idProducto,  
                    Cantidad,
                    Estado,  
                    Total,
                    UserPed)
                VALUES (
                    '" . $idClient . "', 
                    '" . $Datesqlformat . "', 
                    '" . $idProd . "', 
                    '" . $Cantidad . "',
                    'Pendiente', 
                    '" . $Totalprice . "',
                    '" . $User . "')";
        //Verificamos si se inserto correctamente los datos
        $resultado = $mysql->query($query);
        if ($resultado == true) {
            echo 'Se inserto correctamente tu pedido hoy '. $Date;
        }
    }
}