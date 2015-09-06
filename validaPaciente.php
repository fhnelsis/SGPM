<?php
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

$queryPaciente = mysqli_query ( $con, "SELECT * FROM paciente WHERE cpf = '{$_POST['cpf']}' " );

if (mysqli_num_rows ( $queryPaciente ) > 0) {
	die ( "1" );
} else {
	die ( "0" );
}

