<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id_paciente = $_POST ['id_paciente'];
	
	if (empty ( $id_paciente )) {
		$sql = "INSERT INTO atendimento 
            (login, 
             tel_fixo) 
VALUES      ('{$login}', 
             '{$tel_fixo}') ";
	} else {
		$sql = "UPDATE atendimento 
					SET    login = '{$login}', 
					       tel_fixo = '{$tel_fixo}' 
					WHERE  
						   id_paciente = '{$id_paciente}'";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	echo $sql;
	header ( 'Location: consultarAtendimento.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id_funcionario'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM funcionario WHERE id_funcionario = {$_GET['id_funcionario']} " );
	$dadosFuncionario = mysqli_fetch_array ( $query );
}
?>

<div class="divTudoFormPaciente">
	<div id="tituloPagina">
		<center>
				<?php echo isset($_GET['id_paciente']) ? "Alterar Atendimento" : "Cadastrar Atendimento"; ?>
			</center>
	</div>

	<center>
		<div id="formAlteraPaciente">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">
										<tr>
							<br />
							<td><label for="login">Nome do Paciente:</label></td>
							<td><style="width: 250px; margin-bottom: 5px;" type="text"
								name="login" id="login" maxlength="30"
								value="Fulano de Tal" /><br></td>
						</tr>
						
						<tr>
							<br />
							<td><label for="login">Tipo de Atendimento:</label></td>
							<td><select style="width: 250px; margin-bottom: 5px;" type="text"
								name="login" id="login" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['login'] )) {
									echo $dadosFuncionario ['login'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="data_nasc" style="width: 160px">Data do
									Atendimento:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="date"
								name="data_nasc" id="data_nasc" maxlength="10"
								value="<?php
								
								if (isset ( $dadosFuncionario ['data_nasc'] )) {
									echo $dadosFuncionario ['data_nasc'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="endereco" style="width: 100px">Fumante:</label></td>
							<td><Input type='Radio' Name='gender' value='male'
								<?PHP?>&nbsp;N&atilde;o<br>
							<Input type='Radio' Name='gender' value='female' <?PHP?>&nbsp;Sim</td>
						</tr>


						<tr>
							<td><label for="endereco" style="width: 100px">Alcool:</label></td>
							<td><Input type='Radio' Name='gender' value='male'
								<?PHP?>&nbsp;Nunca<br> <Input type='Radio' Name='gender'
								value='female' <?PHP?>&nbsp;Ocasionalmente<br> <Input
								type='Radio' Name='gender' value='female'
								<?PHP?>&nbsp;Frequentemente</td>
						</tr>

						<tr>
							<td><label for="bairro" style="width: 100px">Alergias ou outras Rea&ccedil;&#240;es:</label></td>
							<td><input style="width: 360px; margin-bottom: 5px;" type="text"
								name="bairro" id="bairro" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['bairro'] )) {
									echo $dadosFuncionario ['bairro'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cep" style="width: 100px">Sintomas:</label></td>
							<td><input style="width: 460px; margin-bottom: 5px;" type="text"
								name="cep" id="cep" maxlength="9"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cep'] )) {
									echo $dadosFuncionario ['cep'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade" style="width: 100px">Press&#227;o Arterial:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="cidade" id="cidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cidade'] )) {
									echo $dadosFuncionario ['cidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado" style="width: 100px">Ritmo Card&#237;aco:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="estado" id="estado" maxlength="2"
								value="<?php
								
								if (isset ( $dadosFuncionario ['estado'] )) {
									echo $dadosFuncionario ['estado'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="pais_nacionalidade" style="width: 100px">Ritmo Respirat&#243;rio:</label></td>
							<td><input style="width: 140px; margin-bottom: 5px;" type="text"
								name="pais_nacionalidade" id="pais_nacionalidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['pais_nacionalidade'] )) {
									echo $dadosFuncionario ['pais_nacionalidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade_natural" style="width: 100px">Observa&ccedil;&#240;es Gerais:</label></td>
							<td><textarea style="width: 140px; margin-bottom: 5px;" type="text"
								name="cidade_natural" id="cidade_natural" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cidade_natural'] )) {
									echo $dadosFuncionario ['cidade_natural'];
								}
								?>" />
						</tr>

						

					</table>
					<br> <input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosFuncionario ['id_funcionario'] )) {
							echo $dadosFuncionario ['id_funcionario'];
						}
						?>" /> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
				</form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php')?>