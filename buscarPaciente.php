<?php
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
// Check connection
if (mysqli_connect_errno ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

try {
	// Pega os dados do formulario
	$nome = $_POST ['nome'];
	$cpf = $_POST ['cpf'];
	
	if (empty ( $cpf )) {
		$sql = mysqli_query ( $con, "SELECT * FROM pacientes WHERE nome like '%{$nome}%'" );
	} elseif (empty ( $nome )) {
		$sql = mysqli_query ( $con, "SELECT * FROM pacientes WHERE cpf = '{$cpf}'" );
	} else
		throw new Exception ( 'Por favor, digite algum dado v�lido para pesquisa.' );
	
	$row = mysqli_fetch_array ( $sql );
	
	// $result = mysqli_query($con, $sql);
	
	// Verifica quantidadede linhas
	$num_rows = mysqli_num_rows ( $sql );
	
	// Se <> de zero, invalida o acesso
	if ($num_rows != 1) {
		throw new Exception ( 'O paciente n�o existe!' );
		header ( 'Location: consultarPaciente.php' );
	} else
		header ( 'Location: visualizarPaciente.php' );
		
		// Pega a linha da mem�ria
	$consulta = mysqli_fetch_array ( $sql );
} catch ( Exception $e ) {
	echo "<script>alert('" . $e->getMessage () . "');</script>";
	echo "<script>window.location='consultarPaciente.php';</script>";
	mysqli_close ( $con );
}