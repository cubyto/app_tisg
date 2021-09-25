<?php
    include 'Connect_DB.php';
    //VERIFICACION DE LAS VARIABLES EN EL .html
    if(isset($_POST["Cliente"]) && isset($_POST["Telefono"]) && isset($_POST["Actitud"]) && isset($_POST["Producto"]) && isset($_POST["Codigo"]) && isset($_POST["Cantidad"]) && isset($_POST["Precio"]) && isset($_POST["user"])) { 
        //Definimos las variables
        //client VAR
        $Cliente  = $_POST['Cliente'];
        $Telefono = $_POST['Telefono'];
        $Actitud  = $_POST['Actitud'];
        $user     = $_POST['user'];

        //product VAR
        $Producto = $_POST['Producto'];
        $Codigo   = $_POST['Codigo'];
        $Cantidad = $_POST['Cantidad'];
        $Precio   = $_POST['Precio'];
        
        echo 'postData definida';
    }
    
