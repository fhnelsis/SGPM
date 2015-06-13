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
							<td><label for="login">Login:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="login" id="login" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['login'] )) {
									echo $dadosFuncionario ['login'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="senha">Senha:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;"
								type="password" name="senha" id="senha" maxlength="15"
								value="<?php
								
								if (isset ( $dadosFuncionario ['senha'] )) {
									echo $dadosFuncionario ['senha'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="nome_funcionario">Nome:</label></td>
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="nome_funcionario" id="nome_funcionario" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['nome_funcionario'] )) {
									echo $dadosFuncionario ['nome_funcionario'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cargo">Cargo:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="cargo"
								id="cargo" maxlength="20"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cargo'] )) {
									echo $dadosFuncionario ['cargo'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="cpf"
								id="cpf" maxlength="11"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cpf'] )) {
									echo $dadosFuncionario ['cpf'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="rg">RG:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="rg"
								id="rg" maxlength="10"
								value="<?php
								
								if (isset ( $dadosFuncionario ['rg'] )) {
									echo $dadosFuncionario ['rg'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="org_exp" style="width: 140px">Org&#227;o
									Expedidor:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="org_exp" id="org_exp" maxlength="6"
								value="<?php
								
								if (isset ( $dadosFuncionario ['org_exp'] )) {
									echo $dadosFuncionario ['org_exp'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="genero">G&#234;nero:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="genero" id="genero" maxlength="1"
								value="<?php
								
								if (isset ( $dadosFuncionario ['genero'] )) {
									echo $dadosFuncionario ['genero'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="data_nasc" style="width: 160px">Data de
									Nascimento:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="date"
								name="data_nasc" id="data_nasc" maxlength="10"
								value="<?php
								
								if (isset ( $dadosFuncionario ['data_nasc'] )) {
									echo $dadosFuncionario ['data_nasc'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="endereco" style="width: 100px">Endere&#231;o:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="endereco" id="endereco" maxlength="100"
								value="<?php
								
								if (isset ( $dadosFuncionario ['endereco'] )) {
									echo $dadosFuncionario ['endereco'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="bairro" style="width: 100px">Bairro:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="bairro" id="bairro" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['bairro'] )) {
									echo $dadosFuncionario ['bairro'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cep" style="width: 100px">CEP:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="cep" id="cep" maxlength="9"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cep'] )) {
									echo $dadosFuncionario ['cep'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade" style="width: 100px">Cidade:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="cidade" id="cidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cidade'] )) {
									echo $dadosFuncionario ['cidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado" style="width: 100px">Estado:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="estado" id="estado" maxlength="2"
								value="<?php
								
								if (isset ( $dadosFuncionario ['estado'] )) {
									echo $dadosFuncionario ['estado'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="pais_nacionalidade" style="width: 100px">Nacionalidade:</label></td>
							<td><input style="width: 140px; margin-bottom: 5px;" type="text"
								name="pais_nacionalidade" id="pais_nacionalidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['pais_nacionalidade'] )) {
									echo $dadosFuncionario ['pais_nacionalidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade_natural" style="width: 100px">Naturalidade:</label></td>
							<td><input style="width: 140px; margin-bottom: 5px;" type="text"
								name="cidade_natural" id="cidade_natural" maxlength="30"
								value="<?php
								
								if (isset ( $dadosFuncionario ['cidade_natural'] )) {
									echo $dadosFuncionario ['cidade_natural'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado_natural" style="width: 120px">Estado
									Natural:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="estado_natural" id="estado_natural" maxlength="2"
								value="<?php
								
								if (isset ( $dadosFuncionario ['estado_natural'] )) {
									echo $dadosFuncionario ['estado_natural'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="ubs_atendimento" style="width: 120px">UBS:</label></td>
							<td><select style="width: 200px; margin-bottom: 5px;" type="text"
								name="ubs_atendimento" id="ubs_atendimento" maxlength="30">
									<option value="selecioneUBS"></option>
							<?php
							
							if (isset ( $dadosFuncionario ['ubs_atendimento'] )) {
								$sql_ubs_atendimento = "SELECT ubs_atendimento FROM funcionario WHERE id_funcionario = {$_GET['id']} ";
								
								$resultado = mysqli_query ( $con, $sql_ubs_atendimento );
								
								while ( $line = mysqli_fetch_array ( $resultado ) ) {
									?>
									<option value="<?php echo $line['ubs_atendimento'];?>"> <?php echo $line['ubs_atendimento'];} ?></option><?php
								
								$sqlOtherUBS = "SELECT ubs_atendimento FROM ubs WHERE ubs_atendimento != (SELECT ubs_atendimento FROM funcionario WHERE id_funcionario = {$_GET['id']}) ";
								$resultado = mysqli_query ( $con, $sqlOtherUBS );
								
								while ( $line = mysqli_fetch_array ( $resultado ) ) {
									?>
									<option value="<?php echo $line['ubs_atendimento'];?>"> <?php echo $line['ubs_atendimento'];} ?></option><?php
							} else {
								
								$sql_ubs_atendimento = "select ubs_atendimento from ubs";
								$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
								$resultado = mysqli_query ( $con, $sql_ubs_atendimento );
								
								while ( $line = mysqli_fetch_array ( $resultado ) ) {
									?>
									<option value="<?php echo $line['ubs_atendimento'];?>"> <?php echo $line['ubs_atendimento'];} ?></option>
							</select>
					
								<?php
							}
							
							?></td>
						</tr>

						<tr>
							<td><label for="nome_mae" style="width: 120px">Nome da M&#227;e:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="nome_mae" id="nome_mae" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['nome_mae'] )) {
									echo $dadosFuncionario ['nome_mae'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="nome_pai" style="width: 120px">Nome do Pai:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="nome_pai" id="nome_pai" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['nome_pai'] )) {
									echo $dadosFuncionario ['nome_pai'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado_civil" style="width: 120px">Estado Civil:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="estado_civil" id="estado_civil" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['estado_civil'] )) {
									echo $dadosFuncionario ['estado_civil'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="escolaridade" style="width: 120px">Escolaridade:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="escolaridade" id="escolaridade" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['escolaridade'] )) {
									echo $dadosFuncionario ['escolaridade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tipo_sanguineo" style="width: 140px">Tipo
									Sangu&#237;neo:</label></td>
							<td><input style="width: 40px; margin-bottom: 5px;" type="text"
								name="tipo_sanguineo" id="tipo_sanguineo" maxlength="3"
								value="<?php
								
								if (isset ( $dadosFuncionario ['tipo_sanguineo'] )) {
									echo $dadosFuncionario ['tipo_sanguineo'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="email_pessoal" style="width: 140px">E-mail
									Pessoal:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="email_pessoal" id="email_pessoal" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['email_pessoal'] )) {
									echo $dadosFuncionario ['email_pessoal'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="email_prof" style="width: 140px">E-mail
									Profissional:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="email_prof" id="email_pessoal" maxlength="50"
								value="<?php
								
								if (isset ( $dadosFuncionario ['email_prof'] )) {
									echo $dadosFuncionario ['email_prof'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tel_cel" style="width: 140px">Telefone Celular:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="tel_cel" id="tel_cel" maxlength="10"
								value="<?php
								
								if (isset ( $dadosFuncionario ['tel_cel'] )) {
									echo $dadosFuncionario ['tel_cel'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tel_fixo" style="width: 140px">Telefone Fixo:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="tel_fixo" id="tel_cel" maxlength="10"
								value="<?php
								
								if (isset ( $dadosFuncionario ['tel_fixo'] )) {
									echo $dadosFuncionario ['tel_fixo'];
								}
								?>" /></td>
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