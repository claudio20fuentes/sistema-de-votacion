<?php

class VoteModel{
    private $PDO;

    public function __construct()
    {
        require_once("c://xampp/htdocs/sistema-de-votacion/app/config/db.php");
        $con = new Db(); 
        $this->PDO = $con->conection();
    }

    //FUNCION QUE INSERTA UN REGISTRO EN LA TABLA CIUDADANOS
    public function insertCiudadano($rut,$nombre,$alias,$correo,$estado,$cod_region){
        $statement = $this->PDO->prepare("INSERT INTO ciudadanos VALUES(:rut,:nombre,:alias,:correo,:estado,:cod_region)");
 
        $statement->bindParam(':rut',$rut,PDO::PARAM_STR);
        $statement->bindParam(':nombre',$nombre,PDO::PARAM_STR);
        $statement->bindParam(':alias',$alias,PDO::PARAM_STR);
        $statement->bindParam(':correo',$correo,PDO::PARAM_STR);
        $statement->bindParam(':estado',$estado,PDO::PARAM_INT);
        $statement->bindParam(':cod_region',$cod_region,PDO::PARAM_INT);

        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
    //FUNCION QUE INSERTA UN REGISTRO EN LA TABLA publicidad
    public function insertAdvertising($rut,$tv,$web,$redSocial,$amigo){
        $statement = $this->PDO->prepare("INSERT INTO publicidad VALUES(NULL,:rut,:tv,:web,:redSocial,:amigo)");
 
        $statement->bindParam(':rut',$rut,PDO::PARAM_STR);
        $statement->bindParam(':tv',$tv,PDO::PARAM_INT);
        $statement->bindParam(':web',$web,PDO::PARAM_INT);
        $statement->bindParam(':redSocial',$redSocial,PDO::PARAM_INT);
        $statement->bindParam(':amigo',$amigo,PDO::PARAM_INT);

        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }
    //FUNCION QUE INSERTA UN REGISTRO EN LA TABLA voto
    public function insertVote($rut,$cod_candidate){
        $statement = $this->PDO->prepare("INSERT INTO votos VALUES(NULL,:rut,:cod_candidate,NOW())");
        $statement->bindParam(':rut',$rut,PDO::PARAM_STR);
        $statement->bindParam(':cod_candidate',$cod_candidate,PDO::PARAM_INT);


        return ($statement->execute()) ? $this->PDO->lastInsertId() : false;
    }

    //FUNCION QUE TRAE LISTADO DE REGIONES
    public function showRegion(){
        $statement = $this->PDO->prepare("SELECT * FROM region ");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //FUNCION QUE TRAE LISTADO DE COMUNAS
    public function showCommune($cod){
        $statement = $this->PDO->prepare("SELECT * FROM comuna WHERE cod_region = $cod");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //FUNCION QUE TRAE LISTADO DE CANDIDATOS
    public function showCandidates(){
        $statement = $this->PDO->prepare("SELECT * FROM candidatos");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //FUNCION QUE TRAE RUT
    public function showRut($rut){
        $statement = $this->PDO->prepare("SELECT rut FROM ciudadanos WHERE rut = '$rut'");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>