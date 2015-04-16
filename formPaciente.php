<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$nome = $_POST ['nome_paciente'];
	$cpf = $_POST ['cpf'];
	$id = $_POST ['id'];
	
	if (empty ( $id )) {
		$sql = "INSERT INTO paciente (nome_paciente, cpf) VALUES ('{$nome}', '{$cpf}')";
	} else {
		$sql = "UPDATE paciente SET nome_paciente = '{$nome}' , cpf = '{$cpf}' WHERE id_paciente = {$id} ";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	header ( 'Location: consultarPaciente.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM paciente WHERE id_paciente = {$_GET['id']} " );
	$dadosPaciente = mysqli_fetch_array ( $query );
}
?>

<div class="divTudoFormPaciente">
	<div id="tituloPaginaCadastroAlteracao">
		<center>
				<?php echo isset($_GET['id']) ? "Alterar Paciente" : "Cadastrar Paciente"; ?>
			</center>
	</div>

	<center>
		<div id="formAlteraPaciente">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />
							<td><label for="nome_paciente">Nome:</label></td>
							<td><input style="width: 400px;" type="text" name="nome_paciente"
								id="nome_paciente" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['nome_paciente'] )) {
									echo $dadosPaciente ['nome_paciente'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="width: 150px;" type="text" name="cpf" id="cpf"
								maxlength="11"
								value="<?php
								
								if (isset ( $dadosPaciente ['cpf'] )) {
									echo $dadosPaciente ['cpf'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="rg">RG:</label></td>
							<td><input type="text" name="rg" id="rg" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['rg'] )) {
									echo $dadosPaciente ['rg'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="width: 150px;" type="text" name="cpf" id="cpf"
								maxlength="11"
								value="<?php
								
								if (isset ( $dadosPaciente ['cpf'] )) {
									echo $dadosPaciente ['cpf'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="org_exp" style="width: 140px">Orgão Expedidor:</label></td>
							<td><input style="width: 100px;" type="text" name="org_exp"
								id="org_exp" maxlength="6"
								value="<?php
								
								if (isset ( $dadosPaciente ['org_exp'] )) {
									echo $dadosPaciente ['org_exp'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="genero">Gênero:</label></td>
							<td><input style="width: 30px;" type="text" name="genero"
								id="genero" maxlength="1"
								value="<?php
								
								if (isset ( $dadosPaciente ['genero'] )) {
									echo $dadosPaciente ['genero'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="data_nasc" style="width: 160px">Data de
									Nascimento:</label></td>
							<td><input style="width: 200px;" type="date" name="data_nasc"
								id="data_nasc" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['data_nasc'] )) {
									echo $dadosPaciente ['data_nasc'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="endereco" style="width: 100px">Endereço:</label></td>
							<td><input style="width: 300px;" type="text" name="endereco"
								id="endereco" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['endereco'] )) {
									echo $dadosPaciente ['endereco'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="bairro" style="width: 100px">Bairro:</label></td>
							<td><input style="width: 160px;" type="text" name="bairro"
								id="bairro" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['bairro'] )) {
									echo $dadosPaciente ['bairro'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="cep" style="width: 100px">CEP:</label></td>
							<td><input style="width: 160px;" type="text" name="cep" id="cep"
								maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['cep'] )) {
									echo $dadosPaciente ['cep'];
								}
								?>" /></td>
						</tr>
						<tr>
							<td><label for="cidade" style="width: 100px">Cidade:</label></td>
							<td><input style="width: 160px;" type="text" name="cidade"
								id="cidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['"cidade"'] )) {
									echo $dadosPaciente ['"cidade"'];
								}
								?>" /></td>
						</tr>














					</table>

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
<?php include ('includes/menuBack.php')?>
<?php include ('includes/rodape.php')?>
