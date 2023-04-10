<?php
//trae comunas
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $communes_ = new VoteController();
    $response = $communes_->showComuneC($id); 

    echo json_encode($response);

}else{
//mensaje respuesa de error
}


if(isset($_POST['rut']) && isset($_POST['nombre']) && isset($_POST['alias']) && isset($_POST['correo']) && isset($_POST['region'])){
    
    //VALIDANDO QUE EL RUT QUE SE ENVIO POR EL METODO POST NO EXISTA EN LA BASE DE DATO, 
    //DEBE NO DEVOLVER NINGUN REGISTRO PARA INSERTAR EL REGISTRO
    $vote = new VoteController();
    $responseRut = $vote->showRutC($_POST['rut']);

    foreach ($responseRut as $fila) {
             $comprobarRut = $fila['rut'];
    }

    if ($comprobarRut == "") {

        $rut = $_POST['rut'];
	    $nombre = $_POST['nombre'];
	    $alias = $_POST['alias'];
        $correo = $_POST['correo'];
        $estado = 1;
	    $cod_region = $_POST['region'];

        $responseRut = $vote->showRutC($rut);

	    $response = $vote->saveVote($rut, $nombre, $alias, $correo, $estado, $cod_region);
        json_encode($response);

//INSERT EL REGISTRO DE PUBLICIDAD

        $tv = $_POST['tv'];
        $web = $_POST['web'];
        $redSocial = $_POST['redSocial'];
        $amigo = $_POST['amigo'];

        $AdvertisingC = $vote->insertAdvertisingC($rut,$tv,$web,$redSocial,$amigo);

        //INSERT EL REGISTRO DEL VOTO

        $candidato = $_POST['candidato'];
        $votes = $vote->insertVoteC($rut,$candidato);
        $response = "Registro exitoso";
        echo json_encode($response);

    }else{
        
        $response = "El rut ya existe";
        echo json_encode($response);
    
    }
}else{
//mensaje respuesa de error
}

    class VoteController{
    private $model;

        public function __construct()
        {
            //include "../model/voteModel.php";
            require_once("c://xampp/htdocs/sistema-de-votacion/app/model/voteModel.php");
            $this->model = new VoteModel();
        }

        public function saveVote($rut,$nombre,$alias,$correo,$estado,$cod_region){

           $person = $this->model->insertCiudadano($rut,$nombre,$alias,$correo,$estado,$cod_region);

           return $person;
        }

        public function insertVoteC ($rut,$cod_candidate){

            $vote = $this->model->insertVote($rut,$cod_candidate);
 
            return $vote;
         }

        public function insertAdvertisingC($rut,$tv,$web,$redSocial,$amigo){

            $advertising = $this->model->insertAdvertising($rut,$tv,$web,$redSocial,$amigo);
 
            return $advertising;
         }

        public function showComuneC($cod){

            $communes = $this->model->showCommune($cod);
            
            return ($communes); 
        
        }
    
        public function showRegionC(){
            
            $regions = $this->model->showRegion();
            
            return ($regions); 

        }
    
        public function showCandidatesC(){

            $candidates = $this->model->showCandidates();
            
            return ($candidates); 
        }

        public function showRutC($rut){

            $rut = $this->model->showRut($rut);

            return ($rut);

        }

    }
?>