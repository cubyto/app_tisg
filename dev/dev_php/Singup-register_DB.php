<?php
    include 'Connect_DB.php';
    //VERIFICACION DE LAS VARIABLES EN EL .html
    if(isset($_POST["Username"]) && isset($_POST["Email"]) && isset($_POST["Telefono"]) && isset($_POST["Pass"])){
        //Definimos las variables
        $Username = $_POST['Username'];
        $Email    = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Pass     = sha1($_POST['Pass']);
        include 'Send_mail.php';
        //creamos el query para insertar los datos
        if($conexion){
            if($Enviado = true){
                $query = "INSERT INTO 
                Usuarios (
                    Username, 
                    Email, 
                    Telefono, 
                    Pass, 
                    Confirmado, 
                    Codigo) 
                VALUES (
                    '".$Username."', 
                    '".$Email."', 
                    '".$Telefono."', 
                    '".$Pass."', 
                    'NO', 
                    '".$Codigo."')";

                //Verificando si se inserto los datos correctamente en la tabla
                $resultado = $mysql->query($query);
                if ($resultado == true) {
                    echo 'Favor de revisar tu email para verificar tu cuenta';
                }else {
                    echo 'Error al conectar con el usuario';
                }
            }else {
                echo "no se pudo enviar el email";
            }
        }else {
            echo 'Error de conexion la base de datos';
        }
}
