<?php
    include_once 'Connectclass_DB.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT * FROM Clientes WHERE Nombre LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['Nombre']);
            }
        }
        return $res;
    }

}

    $modelo = new Autocompletar();

    $texto = $_GET['NomClient'];

    $res = $modelo->buscar($texto);

    echo json_encode($res);
    
?>