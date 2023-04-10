<?php
include "config/db.php";
//include"controller/voteController.php";
include "./controller/voteController.php";
$voteController = new VoteController();
$regions = $voteController->showRegionC();
//$communes = $voteController->showComuneC(7);
$candidates = $voteController->showCandidatesC();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/Vote.js"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <title>Document</title>
</head>
<body>
        <h1>Formulario de Votación:</h1>

    <!--Formulario-->
    <section>
        <form action="" method="POST" id="formVotacion">
            <table class="default">
                <!--NOMBRE-->
                <tr>
                    <td><label for="">Nombre y Apellido</label></td>
                    <td><input type="text" required name="nombre" id="nombre"></td>
                </tr>
                <!--ALIAS-->
                <tr>
                    <td><label for="">Alias</label></td>
                    <td><input type="text" required  name="alias" id="alias"></td>
                </tr>
                <!--RUT-->
                <tr>
                    <td><label for="">Rut</label></td>
                    <td><input type="text" required  name="rut" id="rut"></td>
                </tr>
                <!--EMAIL-->
                <tr>
                    <td><label for="">Email</label></td>
                    <td><input type="text" required  name="email" id="email"></td>
                </tr>
                <!--REGION-->
                <tr>
                    <td><label for="">Región</label></td>
                    <td>
                    <select name="region" required id="region">
                    <?php 
                            foreach ($regions as $region) {
                                echo '<option value="'.$region['cod'].'">'.$region["nombre_region"].'</option>';
                            }
                        ?>
                    </select>
                    </td>
                </tr>
                <!--COMUNA-->
                <tr>
                    <td><label for="">Comuna</label></td>
                    <td>
                    <select name="comuna" required id="comuna">

                    </select>
                    </td>
                </tr>
                <!--CANDIDATO-->
                <tr>
                    <td><label for="">Candidato</label></td>
                    <td>
                    <select name="candidato" required id="candidato">
                         <?php 
                            foreach ($candidates as $candidate) {
                                echo '<option value="'.$candidate['cod'].'">'.$candidate["nombre"].'</option>';
                            }
                        ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Como se entero de nosotros</label></td>
                    <td>
                        <input type="checkbox" id="web">
                        <label for="">Web</label>
                    </td>
                    <td>
                        <input type="checkbox" id="tv">
                        <label for="">Tv</label>
                    </td>
                    <td>
                        <input type="checkbox" id="redSocial">
                        <label for="">Redes Sociales</label>
                    </td>
                    <td>
                        <input type="checkbox" id="amigo">
                        <label for="">Amigo</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" id="btnGuardar">Votar</button>
                    </td>
                </tr>
            </table>
        </form>
    </section>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/Vote.js"></script>

</body>
</html>

