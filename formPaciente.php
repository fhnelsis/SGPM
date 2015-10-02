<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'PACIENTE_ALTERAR' );
} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'PACIENTE_DETALHES' );
} else {
	verificarPermissaoPagina ( 'PACIENTE_INSERIR' );
}
?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	
	$id = $_POST ['id'];
	
	$nome_paciente = $_POST ['nome_paciente'];
	$cpf = $_POST ['cpf'];
	$rg = $_POST ['rg'];
	$org_exp = $_POST ['org_exp'];
	$id_genero = $_POST ['id_genero'];
	$data_nasc = $_POST ['data_nasc'];
	$endereco = $_POST ['endereco'];
	$bairro = $_POST ['bairro'];
	$cep = $_POST ['cep'];
	$cidade = $_POST ['cidade'];
	$id_estado = $_POST ['id_estado'];
	$id_ubs = $_POST ['id_ubs'];
	$nome_mae = $_POST ['nome_mae'];
	$nome_pai = $_POST ['nome_pai'];
	$profissao = $_POST ['profissao'];
	$id_estado_civil = $_POST ['id_estado_civil'];
	$id_escolaridade = $_POST ['id_escolaridade'];
	$id_tipo_sanguineo = $_POST ['id_tipo_sanguineo'];
	$email_pessoal = $_POST ['email_pessoal'];
	$email_prof = $_POST ['email_prof'];
	$tel_cel = $_POST ['tel_cel'];
	$tel_fixo = $_POST ['tel_fixo'];
	$tel_contato = $_POST ['tel_contato'];
	
	if (empty ( $id )) {
		mysqli_set_charset ( $con, "utf8" );
		$sql = "INSERT INTO paciente (nome_paciente,
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
									  profissao,
									  id_estado_civil,
									  id_escolaridade, 
		                              id_tipo_sanguineo,
		                              email_pessoal,
		                              email_prof,
		                              tel_cel,
		                              tel_fixo,
		                              tel_contato) 
							   VALUES ('{$nome_paciente}',
										'{$cpf}',
										'{$rg}',
										'{$org_exp}',
										'{$id_genero}',
										'{$data_nasc}',
										'{$endereco}',
										'{$bairro}',
										'{$cep}',
										'{$cidade}',
										'{$id_estado}',
										'{$id_ubs}',
										'{$nome_mae}',
										'{$nome_pai}',
										'{$profissao}',
										'{$id_estado_civil}',
										'{$id_escolaridade}',
										'{$id_tipo_sanguineo}',
										'{$email_pessoal}',
										'{$email_prof}',	
										'{$tel_cel}',
										'{$tel_fixo}',
										'{$tel_contato}')";
	} else {
		mysqli_set_charset ( $con, "utf8" );
		$sql = "UPDATE paciente 
					SET    nome_paciente = '{$nome_paciente}',
						   cpf = '{$cpf}', 
   					       rg = '{$rg}', 
      					   org_exp = '{$org_exp}', 
      					   id_genero = '{$id_genero}', 
   					       data_nasc = '{$data_nasc}', 
    					   endereco = '{$endereco}', 
   			               bairro = '{$bairro}', 
     			           cep = '{$cep}', 
    					   cidade = '{$cidade}', 
  				           id_estado = '{$id_estado}', 
                           id_ubs = '{$id_ubs}', 
                           nome_mae = '{$nome_mae}', 
  					       nome_pai = '{$nome_pai}', 
                           profissao = '{$profissao}', 
                           id_estado_civil = '{$id_estado_civil}', 
                           id_escolaridade = '{$id_escolaridade}', 
                           id_tipo_sanguineo = '{$id_tipo_sanguineo}', 
                           email_pessoal = '{$email_pessoal}', 
                           email_prof = '{$email_prof}', 
                           tel_cel = '{$tel_cel}', 
                           tel_fixo = '{$tel_fixo}', 
                           tel_contato = '{$tel_contato}' 
                   WHERE   id_paciente = {$id} ";
	}
	
	if ($exec = mysqli_query ( $con, $sql )) {
		$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
		header ( 'Location: consultarPaciente.php' );
	} else {
		$_SESSION ['msg'] = 'Registro falhou!';
		header ( 'Location: consultarPaciente.php' );
	}
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	$query = mysqli_query ( $con, "SELECT * FROM paciente WHERE id_paciente = {$_GET['id']} " );
	$dadosPaciente = mysqli_fetch_array ( $query );
}

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

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

<script>
<?php if (isset($_GET['detalhes'])): ?>
        $(document).ready(function() {
            $('input, select, textarea').attr('disabled', true);
        });
<?php endif; ?>
</script>

<div class="divTudoFormPaciente">
	<div id="tituloPaginaCadastroAlteracao">

<center>
<?php
if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
	echo "Alterar Paciente";
} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
	echo "Visualizar Paciente";
} else {
	echo "Novo Paciente";
}
?>
</center>

	</div>

<script type="text/javascript">
$(document).ready(function(){
	    $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99999-999");
        $("input.telefone").mask('(99) 9999-9999');
});
</script>

	<center>
		<div id="formAlteraPaciente">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />

							<!-- Nome  -->
							<td><label for="nome_paciente">Nome:</label></td>
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="nome_paciente" id="nome_paciente" maxlength="50"
								value="<?php
								if (isset ( $dadosPaciente ['nome_paciente'] )) {
									echo $dadosPaciente ['nome_paciente'];
								}
								?>" /></td>
						</tr>

						<!-- CPF  -->
						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="cpf" class="cpf" id="cpf" maxlength="11"
								value="<?php
								if (isset ( $dadosPaciente ['cpf'] )) {
									echo $dadosPaciente ['cpf'];
								}
								?>" /></td>
						</tr>

						<!-- RG  -->
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

						<!-- Orgão Expedidor  -->
						<tr>
							<td><label for="org_exp" style="width: 140px">Orgão Expedidor:</label></td>
							<td><input style="width: 200px; margin-bottom: 5px;" type="text"
								name="org_exp" id="org_exp" maxlength="30"
								value="<?php
								if (isset ( $dadosPaciente ['org_exp'] )) {
									echo $dadosPaciente ['org_exp'];
								}
								?>" /></td>
						</tr>

						<!-- Gênero  -->
						<tr>
							<td><label for="id_genero">Gênero:</label></td>
							<td><select name="id_genero" id="id_genero"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
										<?php while ($linhaGenero = mysqli_fetch_array($queryGenero)): ?>
									<option
										<?php if (isset($dadosPaciente['id_genero']) && $dadosPaciente['id_genero'] == $linhaGenero['id_genero']) : ?>
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
								if (isset ( $dadosPaciente ['data_nasc'] )) {
									echo $dadosPaciente ['data_nasc'];
								}
								?>" /></td>
						</tr>

						<!-- Endereço  -->
						<tr>
							<td><label for="endereco" style="width: 100px">Endereço:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="endereco" id="endereco" maxlength="100"
								value="<?php
								if (isset ( $dadosPaciente ['endereco'] )) {
									echo $dadosPaciente ['endereco'];
								}
								?>" /></td>
						</tr>

						<!-- Bairro  -->
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

						<!-- CEP  -->
						<tr>
							<td><label for="cep" style="width: 100px">CEP:</label></td>
							<td><input style="width: 160px; margin-bottom: 5px;" type="text"
								name="cep" class="cep" id="cep" maxlength="9"
								value="<?php
								if (isset ( $dadosPaciente ['cep'] )) {
									echo $dadosPaciente ['cep'];
								}
								?>" /></td>
						</tr>

						<!-- Cidade  -->
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

						<!-- Estado  -->
						<tr>
							<td><label for="id_estado">Estado:</label></td>
							<td><select name="id_estado" id="id_estado"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaEstado = mysqli_fetch_array($queryEstado)): ?>
                                                                <option
										<?php if (isset($dadosPaciente['id_estado']) && $dadosPaciente['id_estado'] == $linhaEstado['id_estado']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaEstado['id_estado']; ?>"><?php echo $linhaEstado['sigla_estado']; ?></option>
                                                            <?php endwhile; ?></select></td>
						</tr>

						<!-- UBS de Atendimento  -->
						<tr>
							<td><label for="id_ubs">UBS de Atendimento:</label></td>
							<td><select name="id_ubs" id="id_ubs" style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaUBS = mysqli_fetch_array($queryUBS)): ?>
                                                                <option
										<?php if (isset($dadosPaciente['id_ubs']) && $dadosPaciente['id_ubs'] == $linhaUBS['id_ubs']) : ?>
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
								if (isset ( $dadosPaciente ['nome_mae'] )) {
									echo $dadosPaciente ['nome_mae'];
								}
								?>" /></td>
						</tr>

						<!-- Nome do Pai  -->
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

						<!-- Profissão  -->
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

						<!-- Estado Civil  -->
						<tr>
							<td><label for="id_estado_civil">Estado Civil:</label></td>
							<td><select name="id_estado_civil" id="id_estado_civil"
								style="margin-bottom: 5px;">
									<option value="" selected></option>
                                                            <?php while ($linhaEstadoCivil = mysqli_fetch_array($queryEstadoCivil)): ?>
                                                                <option
										<?php if (isset($dadosPaciente['id_estado_civil']) && $dadosPaciente['id_estado_civil'] == $linhaEstadoCivil['id_estado_civil']) : ?>
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
										<?php if (isset($dadosPaciente['id_escolaridade']) && $dadosPaciente['id_escolaridade'] == $linhaEscolaridade['id_escolaridade']) : ?>
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
										<?php if (isset($dadosPaciente['id_tipo_sanguineo']) && $dadosPaciente['id_tipo_sanguineo'] == $linhaTipoSanguineo['id_tipo_sanguineo']) : ?>
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
								if (isset ( $dadosPaciente ['email_pessoal'] )) {
									echo $dadosPaciente ['email_pessoal'];
								}
								?>" /></td>
						</tr>

						<!--  E-mail Profissional  -->
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

						<!--  Telefone Celular  -->
						<tr>
							<td><label for="tel_cel" style="width: 180px">Telefone Celular:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="tel_cel" class="telefone" id="tel_cel" maxlength="15"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_cel'] )) {
									echo $dadosPaciente ['tel_cel'];
								}
								?>" /></td>
						</tr>

						<!--  Telefone Fixo -->
						<tr>
							<td><label for="tel_fixo" style="width: 180px">Telefone Fixo:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="tel_fixo" class="telefone" id="tel_cel" maxlength="15"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_fixo'] )) {
									echo $dadosPaciente ['tel_fixo'];
								}
								?>" /></td>
						</tr>

						<!--  Telefone Contato  -->
						<tr>
							<td><label for="tel_contato" style="width: 180px">Telefone
									Contato:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="tel_contato" class="telefone" id="tel_contato"
								maxlength="15"
								value="<?php
								
								if (isset ( $dadosPaciente ['tel_contato'] )) {
									echo $dadosPaciente ['tel_contato'];
								}
								?>" /></td>
						</tr>

					</table>
					<br>
					
					<?php if (!isset($_GET['detalhes'])): ?>
					<input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosPaciente ['id_paciente'] )) {
							echo $dadosPaciente ['id_paciente'];
						}
						?>" /> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
						<?php endif; ?>
				</form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php')?>