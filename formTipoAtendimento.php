<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'TIPO_ATENDIMENTO_ALTERAR' );
} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
	verificarPermissaoPagina ( 'TIPO_ATENDIMENTO_DETALHES' );
} else {
	verificarPermissaoPagina ( 'TIPO_ATENDIMENTO_INSERIR' );
}

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id = $_POST ['id'];
	$nome_tipo_atendimento = $_POST ['nome_tipo_atendimento'];
	$descricao = $_POST ['descricao'];
	$data_insercao = $_POST ['data_insercao'];
	$data_alteracao = $_POST ['data_alteracao'];
	
	if (empty ( $id )) {
		$sql = "INSERT INTO tipo_atendimento (nome_tipo_atendimento, descricao, data_insercao) 
				VALUES ('{$nome_tipo_atendimento}', '{$descricao}', NOW())";
	} else {
		$sql = "UPDATE tipo_atendimento 
					SET    nome_tipo_atendimento = '{$nome_tipo_atendimento}',
						   descricao = '{$descricao}',
						   data_alteracao = NOW()
                   WHERE   id_tipo_atendimento = {$id} ";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	header ( 'Location: consultarTipoAtendimento.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM tipo_atendimento WHERE id_tipo_atendimento = {$_GET['id']} " );
	$dadosTipoAtendimento = mysqli_fetch_array ( $query );
}
?>

<script>
<?php if (isset($_GET['detalhes'])): ?>
        $(document).ready(function() {
            $('input, select, textarea').attr('disabled', true);
        });
<?php endif; ?>
</script>

<div class="divTudoFormTipoAtendimento">
	<div id="tituloPaginaTipoAtendimentoCadastroAlteracao">
		<center>
				 <?php
					if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
						echo "Alterar Tipo de Atendimento";
					} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
						echo "Visualizar Tipo de Atendimento";
					} else {
						echo "Novo Tipo de Atendimento";
					}
					?>
		</center>
	</div>

	<center>
		<div id="formConsultaAtendimento">
			<div class="content-dataTable"
				style="width: 40%; margin: 0 auto; margin-top: -200px; margin-left: 300px">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />
							<td><label for="nome_tipo_atendimento" style="width: 250px;">Nome
									do Tipo de Atendimento:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="nome_tipo_atendimento" id="nome_tipo_atendimento"
								maxlength="50"
								value="<?php
								
								if (isset ( $dadosTipoAtendimento ['nome_tipo_atendimento'] )) {
									echo $dadosTipoAtendimento ['nome_tipo_atendimento'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="descricao">Descrição:</label></td>
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="descricao" id="descricao" maxlength="300"
								value="<?php
								
								if (isset ( $dadosTipoAtendimento ['descricao'] )) {
									echo $dadosTipoAtendimento ['descricao'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="data_insercao">Data de Inserção:</label></td>
							<td><input readonly style="width: 100px; margin-bottom: 5px;"
								type="text" name="data_insercao" id="data_insercao"
								maxlength="10"
								value="<?php
								if (isset ( $dadosTipoAtendimento ['data_insercao'] )) {
									echo $dadosTipoAtendimento ['data_insercao'];
								} else {
									echo date ( "j, n, Y" );
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="data_alteracao">Data da &#218;ltima
									Altera&#231;&#227;o:</label></td>
							<td><input readonly style="width: 100px;" type="text"
								name="data_alteracao" id="data_alteracao" maxlength="10"
								value="<?php
								if (isset ( $dadosTipoAtendimento ['data_alteracao'] )) {
									echo $dadosTipoAtendimento ['data_alteracao'];
								}
								?>" /></td>
						</tr>


					</table>
					<br>
					<?php if (!isset($_GET['detalhes'])): ?>
					<input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosTipoAtendimento ['id_paciente'] )) {
							echo $dadosTipoAtendimento ['id_paciente'];
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