<?php
    include 'Connect_DB.php';
    //VERIFICACION DE LAS VARIABLES EN EL .html
    if(isset($_POST["Cliente"]) && isset($_POST["Telefono"]) && isset($_POST["Actitud"]) && isset($_POST["Producto"]) && isset($_POST["Codigo"]) && isset($_POST["Cantidad"]) && isset($_POST["Precio"]) && isset($_POST["User"]) && isset($_POST["Date"])) { 
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

        //pedidos VAR
        $Cantidad = $_POST['Cantidad'];
        $Date     = $_POST['Date'];
        $idClient = "";
        $idProd = "";

        
        $insertClient = false;
        $insertProduct = false;

        //Verificamos si ya se inserto el cliente anteriormente
        $resClient = $mysql->query("SELECT * FROM Clientes WHERE 
            Nombre   = '$Cliente' AND
            Telefono = '$Telefono' AND
            UserCli  = '$User'
        ") or die($mysql->error);
        if(mysqli_num_rows($resClient) == 0){
            //Si no se insertaron anteriormente los datos los insertaremos ahora
            $query = "INSERT INTO 
                Clientes (
                    Nombre, 
                    Telefono,
                    Actitud,
                    UserCli) 
                VALUES (
                    '".$Cliente."', 
                    '".$Telefono."', 
                    '".$Actitud."', 
                    '".$User."')";
            //Verificamos si se inserto correctamente los datos
            $resultado = $mysql->query($query);
            $idClient = mysqli_insert_id($mysql);
            if ($resultado == true) {
                $insertClient = true;
            }
        }else{
            $insertClient = true;
        }

        //Verificamos si ya se inserto el cliente anteriormente
        $resProduct = $mysql->query("SELECT * FROM Productos WHERE 
            Producto = '$Producto' AND
            Code     = '$Codigo' AND
            Precio   = '$Precio' AND
            UserProd = '$User'
        ") or die($mysql->error);
        if(mysqli_num_rows($resProduct) == 0){
            //Si no se insertaron anteriormente los datos los insertaremos ahora
            $query = "INSERT INTO 
                Productos (
                    Producto,
                    Code,    
                    Precio,  
                    UserProd)
                VALUES (
                    '".$Producto."', 
                    '".$Codigo."', 
                    '".$Precio."', 
                    '".$User."')";
            //Verificamos si se inserto correctamente los datos
            $resultado = $mysql->query($query);
            $idProd = mysqli_insert_id($mysql);
            if ($resultado == true) {
                $insertProduct = true; 
            }
        }else{
            $insertProduct = true;
        }

        if($insertClient AND $insertProduct == true) {
            echo 'Se registro correctamente los clientes y productos';
            echo  $idClient, $idProd;
        }

    
    
    
    
    }

    
 