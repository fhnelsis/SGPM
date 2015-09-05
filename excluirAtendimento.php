<?php
session_start();
if (isset($_GET['id_excluido'])) {
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    $query = mysqli_query($con, "DELETE FROM atendimento WHERE id_atendimento = {$_GET['id_excluido']} ");
    $_SESSION['msg'] = "Registro Excluido Com Sucesso!";
    
    header('Location: consultarAtendimento.php');
}
 