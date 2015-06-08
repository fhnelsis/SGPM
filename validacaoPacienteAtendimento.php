<?php
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
// Check connection
if (mysqli_connect_error ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}
$cpf = $_POST ['cpf'];

$sql = mysqli_query ( $con, "SELECT id_paciente FROM paciente WHERE cpf = '{$cpf}'" );
$row = mysqli_fetch_array ( $sql );

$num_rows = mysqli_num_rows ( $sql );

// Se <> de zero, invalida o acesso
if ($num_rows == 1) {
	header ( 'Location: home.php' );
} else {
	throw new Exception ( 'Este CPF não está cadastrado em nossa base de dados!' );
}
?>