<?php
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
// Check connection
if (mysqli_connect_error ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

try {
	// Pega os dados do formulario
	$cpf = $_POST ['cpf'];
	
	$sql = mysqli_query ( $con, "SELECT id_paciente FROM paciente WHERE cpf = '{$cpf}'" );
	$row = mysqli_fetch_array ( $sql );
	
	// Verifica quantidadede linhas
	$num_rows = mysqli_num_rows ( $sql );
	
	// Se <> de zero, invalida o acesso
	if ($num_rows == 0) {
		throw new Exception ( 'Este CPF de paciente não existe em nossa base de dados!' );
		
	}
	
	// Pega a linha da memória
	$consulta = mysqli_fetch_array ( $sql );
	
	// Monta a session
	session_name ( 'atendimento' );
	session_start ();
	// $_SESSION['LOGIN']['CODIGO']= $consulta['idadmin'];
	$_SESSION ['LOGIN'] ['ID_PACIENTE'] = $consulta ['id_paciente'];
	
	
	// Redireciona após validação
	header ( 'Location: formCadastrarNovoAtendimento.php' );
} catch ( Exception $e ) {
	echo "<script>alert('" . $e->getMessage () . "');</script>";
	echo "<script>window.location='formAtendimento.php';</script>";
	mysqli_close ( $con );
}
?>