<?php
    include_once 'Connectclass_DB.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT * FROM Consultoras WHERE Apellidos LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['Apellidos']);
            }
        }
        return $res;
    }

}

    $modelo = new Autocompletar();

    $texto = $_GET['ApeConsultant'];

    $res = $modelo->buscar($texto);

    echo json_encode($res);
    
?>