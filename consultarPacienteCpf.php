<?php
session_start();

if ($_REQUEST['cpf_buscado']) {
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    $queryCpfPaciente = mysqli_query($con, "SELECT * FROM paciente WHERE cpf = '{$_POST['cpf_buscado']}' AND id_ubs = '{$_SESSION['LOGIN']['UBS']}' ");
    $paciente = mysqli_fetch_array($queryCpfPaciente);
    echo json_encode($paciente);
    die();
}
