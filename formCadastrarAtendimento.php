<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
		
	$id = $_POST['id'];
	$tipo_atendimento = $_POST ['tipo_atendimento'];
	$id_funcionario = $_POST ['id_funcionario'];
	$data_atendimento = $_POST ['data_atendimento'];
	$fumante = $_POST ['fumante'];
	$alcool = $_POST ['alcool'];
	$alergia_reac_div = $_POST ['alergia_reac_div'];
	$sintomas = $_POST ['sintomas'];
	$queixa_principal = $_POST ['queixa_principal'];
	$hist_molestia = $_POST ['hist_molestia'];
	$frequencia_cardiaca = $_POST ['frequencia_cardiaca'];
	$ritmo_cardiaco = $_POST ['ritmo_cardiaco'];
	$pressao_arterial = $_POST ['pressao_arterial'];
	$ritmo_respiratorio = $_POST ['ritmo_respiratorio'];
	$observacoes = $_POST ['observacoes'];
	
	if (empty ($id)) {
		$sql = "INSERT INTO atendimento (id_atendimento, tipo_atendimento, id_funcionario, data_atendimento, fumante, alcool,
										 alergia_reac_div, sintomas, queixa_principal, hist_molestia, frequencia_cardiaca, 
										 ritmo_cardiaco, pressao_arterial, ritmo_respiratorio, observacoes) 
				VALUES ('{$id_atendimento}', '{$tipo_atendimento}', '{$id_funcionario}', NOW(), '{$fumante}', '{$alcool}',
						'{$alergia_reac_div}', '{$sintomas}', '{$queixa_principal}', '{$hist_molestia}', '{$frequencia_cardiaca}',
						'{$ritmo_cardiaco}', '{$pressao_arterial}', '{$ritmo_respiratorio}', '{$observacoes}')";
	} else {
		$sql = "UPDATE atendimento 
					SET    id_atendimento = '{$id_atendimento}',
						   tipo_atendimento = '{$tipo_atendimento}',
						   id_funcionario = '{$id_funcionario}',
						   fumante = '{$fumante}',
						   alcool = '{$alcool}',
						   alergia_reac_div = '{$alergia_reac_div}',
						   sintomas = '{$sintomas}',
						   queixa_principal = '{$queixa_principal}',
						   hist_molestia = '{$hist_molestia}',
						   frequencia_cardiaca  = '{$frequencia_cardiaca}',
						   ritmo_cardiaco = '{$ritmo_cardiaco}',
						   pressao_arterial = '{$pressao_arterial}',
						   ritmo_respiratorio = '{$ritmo_respiratorio}',
						   observacoes = '{$observacoes}'
                   WHERE   id_atendimento = {$id} ";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	header ( 'Location: consultarAtendimento.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM atendimento WHERE id_atendimento = {$_GET['id']} " );
	$dadosAtendimento = mysqli_fetch_array ( $query );
}
?>

<div class="divTudoFormCadastrarAtendimento">
	<div id="tituloPagina">
		<center>
				<?php echo isset($_GET['id']) ? "Alterar Atendimento" : "Novo Atendimento"; ?>
			</center>
	</div>

	<center>
		<div id="formCadastrarAtendimento">
			<div class="content-dataTable" style="width: 60%; margin: 0 auto; margin-left: 300px;">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />
							<td><label for="cpf">CPF do paciente:</label></td>
							<td><input style="width: 400px;" type="text" name="cpf"
								id="cpf" maxlength="11"
								value="<?php
								
								if (isset ( $dadosPaciente ['nome_paciente'] )) {
									echo $dadosPaciente ['nome_paciente'];
								}
								?>" /></td>
						</tr>

						

					</table>
					<br>

					<input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosPaciente ['id_paciente'] )) {
							echo $dadosPaciente ['id_paciente'];
						}
						?>" /> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
				</form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php')?>