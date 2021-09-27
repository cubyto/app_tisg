<?php
    include "./Connect_DB.php";
    $Nickname = $_POST['Nickname'];
    $Password = sha1($_POST['Password']);
    $res = $mysql->query("SELECT * FROM Usuarios WHERE 
        Username ='$Nickname' AND
        Pass ='$Password' AND
        Confirmado = 'SI'
    ") or die($mysql->error);
    if(mysqli_num_rows($res) > 0){
        header("Location: http://127.0.0.1/holi/public/admin_dash.php?User=$Nickname");
    }else{
        echo 'sesion invalida';
    }
?>
