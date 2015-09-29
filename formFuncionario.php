<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if (isset ( $_GET ['id_funcionario'] )) {
	verificarPermissaoPagina ( 'FUNCIONARIO_ALTERAR' );
} else {
	verificarPermissaoPagina ( 'FUNCIONARIO_INSERIR' );
}
?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id_funcionario = $_POST ['id'];
	$login = $_POST ['login'];
	$senha = $_POST ['senha'];
	$nome_funcionario = $_POST ['nome_funcionario'];
	$cpf = $_POST ['cpf'];
	$rg = $_POST ['rg'];
	$org_exp = $_POST ['org_exp'];
	$data_nasc = $_POST ['data_nasc'];
	$endereco = $_POST ['endereco'];
	$bairro = $_POST ['bairro'];
	$cep = $_POST ['cep'];
	$cidade = $_POST ['cidade'];
	$nome_mae = $_POST ['nome_mae'];
	$nome_pai = $_POST ['nome_pai'];
	$email_pessoal = $_POST ['email_pessoal'];
	$email_prof = $_POST ['email_prof'];
	$tel_cel = $_POST ['tel_cel'];
	$tel_fixo = $_POST ['tel_fixo'];
	
	$id_tipo_funcionario = $_POST ['id_tipo_funcionario'];
	$id_genero = $_POST ['id_genero'];
	$id_estado = $_POST ['id_estado'];
	$id_ubs = $_POST ['id_ubs'];
	$id_estado_civil = $_POST ['id_estado_civil'];
	$id_escolaridade = $_POST ['id_escolaridade'];
	$id_tipo_sanguineo = $_POST ['id_tipo_sanguineo'];
	
	if (empty ( $id_funcionario )) {
		$sql = "INSERT INTO funcionario 
            (login, 
             senha, 
             id_tipo_funcionario,
             nome_funcionario, 
			 cpf, 
             rg, 
             org_exp,
             id_genero,
             data_nasc, 
             endereco, 
             bairro, 
             cep, 
             cidade,
             id_estado,
             id_ubs, 
             nome_mae, 
             nome_pai,
             id_estado_civil,
             id_escolaridade,
             id_tipo_sanguineo,
             email_pessoal, 
             email_prof, 
             tel_cel, 
             tel_fixo
            ) 
VALUES      ('{$login}', 
             '{$senha}', 
             " . $id_tipo_funcionario . ",
             '{$nome_funcionario}', 
             '{$cpf}', 
             '{$rg}', 
             '{$org_exp}', 
             " . $id_genero . ",
             '{$data_nasc}', 
             '{$endereco}', 
             '{$bairro}', 
             '{$cep}', 
             '{$cidade}', 
             " . $id_estado . ",
             '{$id_ubs}', 
             '{$nome_mae}', 
             '{$nome_pai}', 
             " . $id_estado_civil . ",
             " . $id_escolaridade . ",
             " . $id_tipo_sanguineo . ",
             '{$email_pessoal}',
             '{$email_prof}', 
             '{$tel_cel}', 
             '{$tel_fixo}'
             )";
	} else {
		$sql = "UPDATE funcionario 
					SET    login = '{$login}', 
					       senha = '{$senha}', 
						   id_tipo_funcionario = " . $id_tipo_funcionario . ",
					       nome_funcionario = '{$nome_funcionario}',
					       cpf = '{$cpf}', 
					       rg = '{$rg}', 
					       org_exp = '{$org_exp}',
					       id_genero = " . $id_genero . ",
					       data_nasc = '{$data_nasc}', 
					       endereco = '{$endereco}', 
					       bairro = '{$bairro}', 
					       cep = '{$cep}', 
					       cidade = '{$cidade}', 
					       id_estado = " . $id_estado . ",
					       id_ubs = '{$id_ubs}', 
					       nome_mae = '{$nome_mae}', 
					       nome_pai = '{$nome_pai}', 
						   id_estado_civil = " . $id_estado_civil . ",
					       id_escolaridade = " . $id_escolaridade . ",
					       id_tipo_sanguineo = " . $id_tipo_sanguineo . ",
					       email_pessoal = '{$email_pessoal}', 
					       email_prof = '{$email_prof}', 
					       tel_cel = '{$tel_cel}', 
					       tel_fixo = '{$tel_fixo}'
				WHERE  
					       id_funcionario = '{$id_funcionario}'";
	}
	
	if ($exec = mysqli_query ( $con, $sql )) {
		header ( 'Location: consultarFuncionario.php' );
		$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	} else {
		header ( 'Location: consultarFuncionario.php' );
		$_SESSION ['msg'] = 'Registro falhou!';
	}
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id_funcionario'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	$query = mysqli_query ( $con, "SELECT * FROM funcionario WHERE id_funcionario = {$_GET['id_funcionario']} " );
	$dadosFuncionario = mysqli_fetch_array ( $query );
}

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Busca os tipos de funcionários
$queryTipoFuncionario = mysqli_query ( $con, "SELECT * FROM tipo_funcionario" );
// Busca os gêneros
$queryGenero = mysqli_query ( $con, "SELECT * FROM genero" );
// Busca as UBS de atendimento
$queryUBS = mysqli_query ( $con, "SELECT * FROM ubs" );
// Busca os estados civis
$queryEstadoCivil = mysqli_query ( $con, "SELECT * FROM estado_civil" );
// Busca os graus de escolaridade
$queryEscolaridade = mysqli_query ( $con, "SELECT * FROM escolaridade" );
// Busca os tipos sanguíneos
$queryTipoSanguineo = mysqli_query ( $con, "SELECT * FROM tipo_sanguineo" );
// Busca os graus de escolaridade
$queryEstado = mysqli_query ( $con, "select * from estado order by sigla_estado asc" );
?>

<div class="divTudoFormPaciente">
	<div id="tituloPaginaCadastroAlteracao">
		<center>
				<?php echo isset($_GET['id_funcionario']) ? "Alterar Funcionário" : "Cadastrar Funcionário"; ?>
			</center>
	</div>
	<center>
		<div id="formAlteraPaciente">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">

						<!-- Login  -->
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

						<!-- Senha  -->
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

						<!-- Tipo de Funcionário  -->
						<tr>
							<td><label for="id_tipo_funcionario">Tipo de Funcionário:</label></td>
							<td><select name="id_tipo_funcionario" id="id_tipo_fucionario"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaTipoFuncionario = mysqli_fetch_array($queryTipoFuncionario)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_tipo_funcionario']) && $dadosFuncionario['id_tipo_funcionario'] == $linhaTipoFuncionario['id_tipo_funcionario']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaTipoFuncionario['id_tipo_funcionario']; ?>"><?php echo $linhaTipoFuncionario['nome_tipo']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- Nome do Funcionário -->
						<tr>
							<td><label for="nome_funcionario">Nome:</label></td>
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="nome_funcionario" id="nome_funcionario" maxlength="50"
								value="<?php if (isset ( $dadosFuncionario ['nome_funcionario'] )) {echo $dadosFuncionario ['nome_funcionario'];}?>" />
							</td>
						</tr>

						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="cpf"
								id="cpf" maxlength="11"
								value="<?php if (isset ( $dadosFuncionario ['cpf'] )) { echo $dadosFuncionario ['cpf'];}?>" />
							</td>
						</tr>

						<tr>
							<td><label for="rg">RG:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="rg"
								id="rg" maxlength="10"
								value="<?php if (isset ( $dadosFuncionario ['rg'] )) { echo $dadosFuncionario ['rg'];}?>" />
							</td>
						</tr>

						<!-- Orgão Expedidor  -->
						<tr>
							<td><label for="org_exp" style="width: 140px">Orgão Expedidor:</label></td>
							<td><input style="width: 100px; margin-bottom: 5px;" type="text"
								name="org_exp" id="org_exp" maxlength="6"
								value="<?php if (isset ( $dadosFuncionario ['org_exp'] )) { echo $dadosFuncionario ['org_exp'];}?>" />
							</td>
						</tr>

						<!-- Gênero  -->
						<tr>
							<td><label for="id_genero">Gênero:</label></td>
							<td><select name="id_genero" id="id_genero"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
										<?php while ($linhaGenero = mysqli_fetch_array($queryGenero)): ?>
									<option
										<?php if (isset($dadosFuncionario['id_genero']) && $dadosFuncionario['id_genero'] == $linhaGenero['id_genero']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaGenero['id_genero']; ?>"><?php echo $linhaGenero['nome_genero']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- Data de Nascimento  -->
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

						<!-- Endereço  -->
						<tr>
							<td><label for="endereco" style="width: 100px">Endereço:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="endereco" id="endereco" maxlength="100"
								value="<?php
								
								if (isset ( $dadosFuncionario ['endereco'] )) {
									echo $dadosFuncionario ['endereco'];
								}
								?>" /></td>
						</tr>

						<!-- Bairro  -->
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

						<!-- CEP  -->
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

						<!-- Cidade  -->
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

						<!-- Estado  -->
						<tr>
							<td><label for="id_estado">Estado:</label></td>
							<td><select name="id_estado" id="id_estado"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaEstado = mysqli_fetch_array($queryEstado)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_estado']) && $dadosFuncionario['id_estado'] == $linhaEstado['id_estado']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaEstado['id_estado']; ?>"><?php echo $linhaEstado['sigla_estado']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- UBS Atendimento  -->
						<tr>
							<td><label for="id_ubs">UBS de Atendimento:</label></td>
							<td><select name="id_ubs" id="id_ubs" style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaUBS = mysqli_fetch_array($queryUBS)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_ubs']) && $dadosFuncionario['id_ubs'] == $linhaUBS['id_ubs']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaUBS['id_ubs']; ?>"><?php echo $linhaUBS['ubs_atendimento']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- Nome da Mãe  -->
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

						<!-- Nome do Pai  -->
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

						<!-- Estado Civil  -->
						<tr>
							<td><label for="id_estado_civil">Estado Civil:</label></td>
							<td><select name="id_estado_civil" id="id_estado_civil"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaEstadoCivil = mysqli_fetch_array($queryEstadoCivil)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_estado_civil']) && $dadosFuncionario['id_estado_civil'] == $linhaEstadoCivil['id_estado_civil']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaEstadoCivil['id_estado_civil']; ?>"><?php echo $linhaEstadoCivil['estado_civil']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- Escolaridade  -->
						<tr>
							<td><label for="id_escolaridade">Escolaridade:</label></td>
							<td><select name="id_escolaridade" id="id_escolaridade"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaEscolaridade = mysqli_fetch_array($queryEscolaridade)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_escolaridade']) && $dadosFuncionario['id_escolaridade'] == $linhaEscolaridade['id_escolaridade']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaEscolaridade['id_escolaridade']; ?>"><?php echo $linhaEscolaridade['escolaridade']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- Tipo Sanguíneo  -->
						<tr>
							<td><label for="id_tipo_sanguineo">Tipo Sanguíneo:</label></td>
							<td><select name="id_tipo_sanguineo" id="id_tipo_sanguineo"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaTipoSanguineo = mysqli_fetch_array($queryTipoSanguineo)): ?>
                                                                <option
										<?php if (isset($dadosFuncionario['id_tipo_sanguineo']) && $dadosFuncionario['id_tipo_sanguineo'] == $linhaTipoSanguineo['id_tipo_sanguineo']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaTipoSanguineo['id_tipo_sanguineo']; ?>"><?php echo $linhaTipoSanguineo['tipo_sanguineo']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- E-mail Pessoal  -->
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

						<!-- E-mail Profissional  -->
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

						<!-- Telefone Celular  -->
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

						<!-- Telefone Fixo  -->
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