<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'ATENDIMENTO_ALTERAR' );
} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'ATENDIMENTO_DETALHES' );
} else {
	verificarPermissaoPagina ( 'ATENDIMENTO_INSERIR' );
}
?>

<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id_atendimento = $_POST ['id'];
	$id_tipo_atendimento = $_POST ['id_tipo_atendimento'];
	$id_funcionario = $_POST ['id_funcionario'];
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
	
	// Busca o cpf do paciente
	$queryCpfPaciente = mysqli_query ( $con, "SELECT id_paciente FROM paciente WHERE cpf = '{$_POST['cpf_paciente']}' " );
	$pacienteId = mysqli_fetch_array ( $queryCpfPaciente );
	
	if (empty ( $id_atendimento )) {
		$sql = "INSERT INTO atendimento (id_tipo_atendimento, id_funcionario, data_atendimento, fumante, alcool,
										 alergia_reac_div, sintomas, queixa_principal, hist_molestia, frequencia_cardiaca, 
										 ritmo_cardiaco, pressao_arterial, ritmo_respiratorio, observacoes, id_paciente) 
				VALUES (" . $id_tipo_atendimento . ", " . $id_funcionario . ", NOW(), '{$fumante}', '{$alcool}',
						'{$alergia_reac_div}', '{$sintomas}', '{$queixa_principal}', '{$hist_molestia}', '{$frequencia_cardiaca}',
						'{$ritmo_cardiaco}', '{$pressao_arterial}', '{$ritmo_respiratorio}', '{$observacoes}', " . $pacienteId ['id_paciente'] . ")";
	} else {
		$sql = "UPDATE atendimento 
					SET    
						   id_tipo_atendimento = " . $id_tipo_atendimento . ",
						   id_funcionario = " . $id_funcionario . ",
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
						   observacoes = '{$observacoes}',
                                                   id_paciente = " . $pacienteId ['id_paciente'] . "
                   WHERE   id_atendimento = {$id_atendimento} ";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	header ( 'Location: consultarAtendimento.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT at.*, pac.cpf cpf_paciente FROM atendimento at LEFT JOIN paciente pac ON pac.id_paciente = at.id_paciente WHERE at.id_atendimento = {$_GET['id']} " );
	$dadosAtendimento = mysqli_fetch_array ( $query );
}

// Busca os tipos de atendimento
$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Busca os tipos de atendimento
$queryTipos = mysqli_query ( $con, "SELECT * FROM tipo_atendimento" );

// Busca os funcionÃ¡rios
$queryFuncionario = mysqli_query ( $con, "SELECT * FROM funcionario" );
?>

<script type="text/javascript">
    function validar() {
        $.post("validaPaciente.php", {cpf: $("#cpf_paciente").val()}, function(data) {
            if (data == '0') {
                alert('Informe um CPF de um paciente que esteja cadastrado no sistema!');
                return false;
            }

            if ($('#id_tipo_atendimento').val() === "") {
                alert('Informe o tipo de atendimento!');
                return false;
            }

            if ($('#id_funcionario').val() === "") {
                alert('Informe o funcionÃ¡rio!');
                return false;
            }

            if ($('#f_sim').is(':checked') == false && $('#f_nao').is(':checked') == false) {
                alert('Informe o se Ã© fumante!');
                return false;
            }

            if ($('#a_sim').is(':checked') == false && $('#a_nao').is(':checked') == false) {
                alert('Informe o se usa Ã¡lcool!');
                return false;
            }

            if ($('#alergia_reac_div').val() === "") {
                alert('Informe se possui alergia!');
                return false;
            }
            if ($('#alergia_reac_div').val() === "") {
                alert('Informe se possui alergia!');
                return false;
            }

            if ($('#sintomas').val() === "") {
                alert('Informe os sintomas!');
                return false;
            }

            if ($('#queixa_principal').val() === "") {
                alert('Informe a queixa principal!');
                return false;
            }

            if ($('#hist_molestia').val() === "") {
                alert('Informe se possui histÃ³rico de molestia!');
                return false;
            }

            if ($('#freq_cardiaca').val() === "") {
                alert('Informe a frequÃªncia cardÃ­aca!');
                return false;
            }

            if ($('#ritmo_cardiaco').val() === "") {
                alert('Informe o ritmo cardÃ­aco!');
                return false;
            }

            if ($('#pressao_arterial').val() === "") {
                alert('Informe a pressÃ£o arterial!');
                return false;
            }

            if ($('#ritmo_respiratorio').val() === "") {
                alert('Informe o ritmo respiratÃ³rio!');
                return false;
            }

            if ($('#observacoes').val() === "") {
                alert('Informe alguma observaÃ§Ã£o!');
                return false;
            }

            $('form').submit();


        });



    }

<?php if (isset($_GET['detalhes'])): ?>
        $(document).ready(function() {
            $('input, select, textarea').attr('disabled', true);
        });
<?php endif; ?>

</script>
<div class="divTudoFormAtendimento">
	<div id="tituloPaginaAtendimentoCadastroAlteracao">
		<center>

            <?php
												if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
													echo "Alterar Atendimento";
												} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
													echo "Visualizar Atendimento";
												} else {
													echo "Novo Atendimento";
												}
												?>
        </center>
	</div>

	<center>
		<div id="formConsultaAtendimento">
			<div style="margin-top: 30px; margin-left: 300px;">
				<form method="POST">
					<table width="100%">
						<tr>
							<td><label for="cpf">CPF:</label></td>
							<td><input style="width: 150px; margin-top: 5px;" type="text"
								name="cpf_paciente" id="cpf_paciente" maxlength="11"
								value="<?php
								if (isset ( $dadosAtendimento ['cpf_paciente'] )) {
									echo $dadosAtendimento ['cpf_paciente'];
								}
								?>" /></td>
						</tr>

						<!-- Tipo de Atendimento -->
						<tr>
							<td><label for="id_tipo_atendimento">Tipo Atendimento:</label></td>
							<td><select name="id_tipo_atendimento" id="id_tipo_atendimento"
								style="margin-top: 5px;">
									<option value="" selected></option>
                                    <?php while ($linhaAtendimento = mysqli_fetch_array($queryTipos)): ?>
                                        <option
										<?php if (isset($dadosAtendimento['id_tipo_atendimento']) && $dadosAtendimento['id_tipo_atendimento'] == $linhaAtendimento['id_tipo_atendimento']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaAtendimento['id_tipo_atendimento']; ?>"><?php echo $linhaAtendimento['nome_tipo_atendimento']; ?></option>
                                    <?php endwhile; ?>
                                </select></td>
						</tr>

						<!-- FuncionÃ¡rio  -->
						<tr>
							<td><label for="id_funcionario">Funcionário:</label></td>
							<td><select name="id_funcionario" id="id_funcionario"
								style="margin-top: 5px;">
									<option value="" selected></option>
                                    <?php while ($linhaFuncionario = mysqli_fetch_array($queryFuncionario)): ?>
                                        <option
										<?php if (isset($dadosAtendimento['id_funcionario']) && $dadosAtendimento['id_funcionario'] == $linhaFuncionario['id_funcionario']) : ?>
										selected <?php endif; ?>
										value="<?php echo $linhaFuncionario['id_funcionario']; ?>"><?php echo $linhaFuncionario['nome_funcionario']; ?></option>
                                    <?php endwhile; ?>
                                </select></td>
						</tr>

						<!-- Fumante? -->
						<tr>
							<td><label for="fumante" style="width: 160px">Fumante?</label></td>
							<td><input style="margin-top: 5px;" type="radio" name="fumante"
								id="f_sim" value="1"
								<?php if (isset($dadosAtendimento['fumante']) && $dadosAtendimento['fumante'] == 1) : ?>
								checked <?php endif; ?> /> Sim <br /> <input
								style="margin-top: 5px;" type="radio" name="fumante" id="f_nao"
								value="0"
								<?php if (isset($dadosAtendimento['fumante']) && $dadosAtendimento['fumante'] == 0) : ?>
								checked <?php endif; ?> /> Não <br /></td>
						</tr>

						<!-- Alcool? -->
						<tr>
							<td><label for="alcool" style="width: 160px">Álcool</label></td>
							<td><input style="margin-top: 5px" type="radio" name="alcool"
								id="a_sim" value="1"
								<?php if (isset($dadosAtendimento['alcool']) && $dadosAtendimento['alcool'] == 1) : ?>
								checked <?php endif; ?> /> Sim <br /> <input
								style="margin-top: 5px" type="radio" name="alcool" id="a_nao"
								value="0"
								<?php if (isset($dadosAtendimento['alcool']) && $dadosAtendimento['alcool'] == 0) : ?>
								checked <?php endif; ?> /> Não <br /></td>
						</tr>

						<!-- Alergia -->
						<tr>
							<td><label for="alergia_reac_div">Alergia:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="alergia_reac_div" id="alergia_reac_div" maxlength="50"
								value="<?php echo isset($dadosAtendimento['alergia_reac_div']) ? $dadosAtendimento['alergia_reac_div'] : ""; ?>" /></td>
						</tr>

						<!-- Sintomas -->
						<tr>
							<td><label for="sintomas">Sintomas:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="sintomas" id="sintomas" maxlength="30"
								value="<?php echo isset($dadosAtendimento['sintomas']) ? $dadosAtendimento['sintomas'] : ""; ?>" /></td>
						</tr>

						<!-- Queixa Principal -->
						<tr>
							<td><label for="queixa_principal">Queixa Principal:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="queixa_principal" id="queixa_principal" maxlength="30"
								value="<?php echo isset($dadosAtendimento['queixa_principal']) ? $dadosAtendimento['queixa_principal'] : ""; ?>" /></td>
						</tr>

						<!-- HistÃ³rico Molestia -->
						<tr>
							<td><label for="hist_molestia">Histórico Molestia:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="hist_molestia" id="hist_molestia" maxlength="100"
								value="<?php echo isset($dadosAtendimento['hist_molestia']) ? $dadosAtendimento['hist_molestia'] : ""; ?>" /></td>
						</tr>


						<!-- Frequencia Cardiaca -->
						<tr>
							<td><label for="frequencia_cardiaca">Frequência Cardíaca:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="frequencia_cardiaca" id="frequencia_cardiaca"
								maxlength="10"
								value="<?php echo isset($dadosAtendimento['frequencia_cardiaca']) ? $dadosAtendimento['frequencia_cardiaca'] : ""; ?>" /></td>
						</tr>

						<!-- Ritmo Cardiaco -->
						<tr>
							<td><label for="ritmo_cardiaco">Ritmo Cardíaco:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="ritmo_cardiaco" id="ritmo_cardiaco" maxlength="10"
								value="<?php echo isset($dadosAtendimento['ritmo_cardiaco']) ? $dadosAtendimento['ritmo_cardiaco'] : ""; ?>" /></td>
						</tr>

						<!-- PressÃ£o Arterial -->
						<tr>
							<td><label for="pressao_arterial">Pressão Arterial:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="pressao_arterial" id="pressao_arterial" maxlength="10"
								value="<?php echo isset($dadosAtendimento['pressao_arterial']) ? $dadosAtendimento['pressao_arterial'] : ""; ?>" /></td>
						</tr>

						<!-- Ritmo RespiratÃ³rio -->
						<tr>
							<td><label for="ritmo_respiratorio">Ritmo Respiratório:</label></td>
							<td><input style="width: 400px; margin-top: 5px;" type="text"
								name="ritmo_respiratorio" id="ritmo_respiratorio" maxlength="10"
								value="<?php echo isset($dadosAtendimento['ritmo_respiratorio']) ? $dadosAtendimento['ritmo_respiratorio'] : ""; ?>" /></td>
						</tr>

						<!-- ObservaÃ§Ãµes -->
						<tr>
							<td><label for="observacoes">Observações:</label></td>
							<td><textarea cols="50" maxlength="300" name="observacoes"
									id="observacoes" style="height: 100px; margin-top: 10px;">
                                    <?php echo isset($dadosAtendimento['observacoes']) ? $dadosAtendimento['observacoes'] : ""; ?>
                                </textarea></td>
						</tr>


					</table>
					<br> <input type="hidden" id="id" name="id"
						value="<?php echo isset($dadosAtendimento['id_atendimento']) ? $dadosAtendimento['id_atendimento'] : ""; ?>" /> 

                    <?php if (!isset($_GET['detalhes'])): ?>
                        <input type="button" name="enviar"
						value="ENVIAR" id="enviar_cadastro" onclick="validar()" />
                    <?php endif; ?>
                </form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php') ?>