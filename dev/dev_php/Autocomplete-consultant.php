<?php
    include_once 'Connectclass_DB.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT * FROM Consultoras WHERE Nombres LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['Nombres']);
            }
        }
        return $res;
    }

}

    $modelo = new Autocompletar();

    $texto = $_GET['NomConsult'];

    $res = $modelo->buscar($texto);

    echo json_encode($res);
    
?>