<?php
    include "./Connect_DB.php";
    $Email = $_POST['Email'];
    $Codigo = $_POST['Codigo'];
    $res = $mysql->query("SELECT * FROM Usuarios WHERE 
    Email ='$Email' 
    AND
    Codigo ='$Codigo'
    ") or die($mysql->error);
    if(mysqli_num_rows($res) > 0){
        $mysql->query("UPDATE Usuarios SET Confirmado = 'SI' WHERE Email = '$Email'");
    }else{
        echo "Codigo invalido";
    }
?>
