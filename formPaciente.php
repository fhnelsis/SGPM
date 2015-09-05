<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php 
    if(isset($_GET['id'])){
        verificarPermissaoPagina('PACIENTE_ALTERAR');
    }else{
        verificarPermissaoPagina('PACIENTE_INSERIR');
    }
?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id = $_POST ['id'];
	$nome_paciente = $_POST ['nome_paciente'];
	$cpf = $_POST ['cpf'];
	$rg = $_POST ['rg'];
	$org_exp = $_POST ['org_exp'];
	$genero = $_POST ['genero'];
	$data_nasc = $_POST ['data_nasc'];
	$endereco = $_POST ['endereco'];
	$bairro = $_POST ['bairro'];
	$cep = $_POST ['cep'];
	$cidade = $_POST ['cidade'];
	$estado = $_POST ['estado'];
	$pais_nacionalidade = $_POST ['pais_nacionalidade'];
	$cidade_natural = $_POST ['cidade_natural'];
	$estado_natural = $_POST ['estado_natural'];
	$ubs_atendimento = $_POST ['ubs_atendimento'];
	$nome_mae = $_POST ['nome_mae'];
	$nome_pai = $_POST ['nome_pai'];
	$profissao = $_POST ['profissao'];
	$estado_civil = $_POST ['estado_civil'];
	$escolaridade = $_POST ['escolaridade'];
	$tipo_sanguineo = $_POST ['tipo_sanguineo'];
	$email_pessoal = $_POST ['email_pessoal'];
	$email_prof = $_POST ['email_prof'];
	$tel_cel = $_POST ['tel_cel'];
	$tel_fixo = $_POST ['tel_fixo'];
	$tel_contato = $_POST ['tel_contato'];
	
	if (empty ( $id )) {
		$sql = "INSERT INTO paciente (nome_paciente, cpf, rg, org_exp, genero, data_nasc, endereco, bairro, cep, 
									  cidade, estado, pais_nacionalidade, cidade_natural, estado_natural, 
		                              ubs_atendimento, nome_mae, nome_pai, profissao, estado_civil, escolaridade, 
		                              tipo_sanguineo, email_pessoal, email_prof, tel_cel, tel_fixo, tel_contato) 
				VALUES ('{$nome_paciente}', '{$cpf}', '{$rg}', '{$org_exp}', '{$genero}', '{$data_nasc}', '{$endereco}', 
						'{$bairro}', '{$cep}', '{$cidade}', '{$estado}', '{$pais_nacionalidade}', '{$cidade_natural}', 
						'{$estado_natural}', '{$ubs_atendimento}', '{$nome_mae}', '{$nome_pai}', '{$profissao}', 
						'{$estado_civil}', '{$escolaridade}', '{$tipo_sanguineo}', '{$email_pessoal}', '{$email_prof}', 
						'{$tel_cel}', '{$tel_fixo}', '{$tel_contato}')";
	} else {
		$sql = "UPDATE paciente 
					SET    nome_paciente = '{$nome_paciente}',
						   cpf = '{$cpf}', 
   					       rg = '{$rg}', 
      					   org_exp = '{$org_exp}', 
      					   genero = '{$genero}', 
   					       data_nasc = '{$data_nasc}', 
    					   endereco = '{$endereco}', 
   			               bairro = '{$bairro}', 
     			           cep = '{$cep}', 
    					   cidade = '{$cidade}', 
  				           estado = '{$estado}', 
                           pais_nacionalidade = '{$pais_nacionalidade}', 
    					   cidade_natural = '{$cidade_natural}', 
                           estado_natural = '{$estado_natural}', 
                           ubs_atendimento = '{$ubs_atendimento}', 
                           nome_mae = '{$nome_mae}', 
  					       nome_pai = '{$nome_pai}', 
                           profissao = '{$profissao}', 
                           estado_civil = '{$estado_civil}', 
                           escolaridade = '{$escolaridade}', 
                           tipo_sanguineo = '{$tipo_sanguineo}', 
                           email_pessoal = '{$email_pessoal}', 
                           email_prof = '{$email_prof}', 
                           tel_cel = '{$tel_cel}', 
                           tel_fixo = '{$tel_fixo}', 
                           tel_contato = '{$tel_contato}' 
                   WHERE   id_paciente = {$id} ";
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
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="nome_paciente" id="nome_paciente" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['nome_paciente'] )) {
									echo $dadosPaciente ['nome_paciente'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="cpf" id="cpf" maxlength="11"
								value="<?php
								
								if (isset ( $dadosPaciente ['cpf'] )) {
									echo $dadosPaciente ['cpf'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="rg">RG:</label></td>
							<td><input style="margin-bottom: 5px;" ; type="text" name="rg"
								id="rg" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['rg'] )) {
									echo $dadosPaciente ['rg'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="org_exp" style="width: 140px">Org&#227;o
									Expedidor:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="org_exp" id="org_exp" maxlength="6"
								value="<?php
								
								if (isset ( $dadosPaciente ['org_exp'] )) {
									echo $dadosPaciente ['org_exp'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="genero">G&#234;nero:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="genero" id="genero" maxlength="1"
								value="<?php
								
								if (isset ( $dadosPaciente ['genero'] )) {
									echo $dadosPaciente ['genero'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="data_nasc" style="width: 160px">Data de
									Nascimento:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="date"
								name="data_nasc" id="data_nasc" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['data_nasc'] )) {
									echo $dadosPaciente ['data_nasc'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="endereco" style="width: 100px">Endere&#231;o:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="endereco" id="endereco" maxlength="100"
								value="<?php
								
								if (isset ( $dadosPaciente ['endereco'] )) {
									echo $dadosPaciente ['endereco'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="bairro" style="width: 100px">Bairro:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="bairro" id="bairro" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['bairro'] )) {
									echo $dadosPaciente ['bairro'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cep" style="width: 100px">CEP:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="cep" id="cep" maxlength="9"
								value="<?php
								
								if (isset ( $dadosPaciente ['cep'] )) {
									echo $dadosPaciente ['cep'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade" style="width: 100px">Cidade:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="cidade" id="cidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['cidade'] )) {
									echo $dadosPaciente ['cidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado" style="width: 100px">Estado:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="estado" id="estado" maxlength="2"
								value="<?php
								
								if (isset ( $dadosPaciente ['estado'] )) {
									echo $dadosPaciente ['estado'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="pais_nacionalidade" style="width: 100px">Nacionalidade:</label></td>
							<td><input style="width: 140px; margin-bottom: 5px;" type="text"
								name="pais_nacionalidade" id="pais_nacionalidade" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['pais_nacionalidade'] )) {
									echo $dadosPaciente ['pais_nacionalidade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="cidade_natural" style="width: 100px">Naturalidade:</label></td>
							<td><input style="width: 140px; margin-bottom: 5px;" type="text"
								name="cidade_natural" id="cidade_natural" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['cidade_natural'] )) {
									echo $dadosPaciente ['cidade_natural'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado_natural" style="width: 120px">Estado
									Natural:</label></td>
							<td><input style="width: 30px; margin-bottom: 5px;" type="text"
								name="estado_natural" id="estado_natural" maxlength="2"
								value="<?php
								
								if (isset ( $dadosPaciente ['estado_natural'] )) {
									echo $dadosPaciente ['estado_natural'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="ubs_atendimento" style="width: 120px">UBS:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="ubs_atendimento" id="ubs_atendimento" maxlength="30"
								value="<?php
								
								if (isset ( $dadosPaciente ['ubs_atendimento'] )) {
									echo $dadosPaciente ['ubs_atendimento'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="nome_mae" style="width: 120px">Nome da M&#227;e:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="nome_mae" id="nome_mae" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['nome_mae'] )) {
									echo $dadosPaciente ['nome_mae'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="nome_pai" style="width: 120px">Nome do Pai:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="nome_pai" id="nome_pai" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['nome_pai'] )) {
									echo $dadosPaciente ['nome_pai'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="profissao" style="width: 120px">Profiss&#227;o:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="profissao" id="profissao" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['profissao'] )) {
									echo $dadosPaciente ['profissao'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="estado_civil" style="width: 120px">Estado Civil:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="estado_civil" id="estado_civil" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['estado_civil'] )) {
									echo $dadosPaciente ['estado_civil'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="escolaridade" style="width: 120px">Escolaridade:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="escolaridade" id="escolaridade" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['escolaridade'] )) {
									echo $dadosPaciente ['escolaridade'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tipo_sanguineo" style="width: 140px">Tipo
									Sangu&#237;neo:</label></td>
							<td><input style="width: 40px; margin-bottom: 5px;" type="text"
								name="tipo_sanguineo" id="tipo_sanguineo" maxlength="3"
								value="<?php
								
								if (isset ( $dadosPaciente ['tipo_sanguineo'] )) {
									echo $dadosPaciente ['tipo_sanguineo'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="email_pessoal" style="width: 140px">E-mail
									Pessoal:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="email_pessoal" id="email_pessoal" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['email_pessoal'] )) {
									echo $dadosPaciente ['email_pessoal'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="email_prof" style="width: 140px">E-mail
									Profissional:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="email_prof" id="email_pessoal" maxlength="50"
								value="<?php
								
								if (isset ( $dadosPaciente ['email_prof'] )) {
									echo $dadosPaciente ['email_prof'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tel_cel" style="width: 140px">Telefone Celular:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="tel_cel" id="tel_cel" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_cel'] )) {
									echo $dadosPaciente ['tel_cel'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tel_fixo" style="width: 140px">Telefone Fixo:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="tel_fixo" id="tel_cel" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_fixo'] )) {
									echo $dadosPaciente ['tel_fixo'];
								}
								?>" /></td>
						</tr>

						<tr>
							<td><label for="tel_contato" style="width: 140px">Telefone
									Contato:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="tel_contato" id="tel_contato" maxlength="10"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_contato'] )) {
									echo $dadosPaciente ['tel_contato'];
								}
								?>" /></td>
						</tr>

					</table>
					<br> <input type="hidden" id="id" name="id"
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