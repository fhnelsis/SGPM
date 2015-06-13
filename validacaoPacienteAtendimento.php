<?php
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
// Verifica a conexão.
if (mysqli_connect_error ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}
$cpf = $_POST ['cpf'];

$id_paciente = mysqli_query ( $con, "SELECT id_paciente FROM paciente WHERE cpf = '{$cpf}'" );
$row = mysqli_fetch_array ( $id_paciente );

$num_rows = mysqli_num_rows ( $id_paciente );

// Se != de um, invalida a consulta.
if ($num_rows == 1) {
	header ( 'Location: formCadastrarNovoAtendimento.php' );
} else {
	throw new Exception ( 'Este CPF não está cadastrado em nossa base de dados!' );
}

?>