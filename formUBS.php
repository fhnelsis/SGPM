<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id = $_POST ['id'];
	$ubs_atendimento = $_POST ['ubs_atendimento'];
	$localizacao = $_POST ['localizacao'];
	$data_insercao = $_POST ['data_insercao'];
	$data_alteracao = $_POST ['data_alteracao'];
	
	if (empty ( $id )) {
		$sql = "INSERT INTO ubs (ubs_atendimento, localizacao, data_insercao) 
				VALUES ('{$ubs_atendimento}', '{$localizacao}', NOW())";
	} else {
		$sql = "UPDATE ubs 
					SET    ubs_atendimento = '{ubs_atendimento}',
						   localizacao = '{$localizacao}',
						   data_alteracao = NOW()
                   WHERE   id_ubs = {$id} ";
	}
	
	$exec = mysqli_query ( $con, $sql );
	$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';
	header ( 'Location: consultarUbs.php' );
}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM ubs WHERE id_ubs = {$_GET['id']} " );
	$dadosUbs = mysqli_fetch_array ( $query );
}
?>

<div class="divTudoFormUbs">
	<div id="tituloPagina">
		<center>
				<?php echo isset($_GET['id']) ? "Alterar Unidade B&aacute;sica" : "Cadastrar Unidade B&aacute;sica"; ?>
			</center>
	</div>

	<center>
		<div id="formConsultaAtendimento">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />
							<td><label for="ubs_atendimento" style="width: 250px;">Nome
									da UBS:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text"
								name="ubs_atendimento" id="ubs_atendimento"
								maxlength="50"
								value="<?php
								
								if (isset ( $dadosUbs ['ubs_atendimento'] )) {
									echo $dadosUbs ['ubs_atendimento'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="localizacao">Localiza&ccedil;&atilde;o:</label></td>
							<td><input style="width: 400px; margin-bottom: 5px;" type="text"
								name="localizacao" id="localizacao" maxlength="300"
								value="<?php
								
								if (isset ( $dadosUbs ['localizacao'] )) {
									echo $dadosUbs ['localizacao'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="data_insercao">Data de Inser&#231;&#227;o:</label></td>
							<td><input readonly style="width: 100px;" type="text"
								name="data_insercao" id="data_insercao" maxlength="10"
								value="<?php
								if (isset ( $dadosUbs ['data_insercao'] )) {
									echo $dadosUbs ['data_insercao'];
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
								if (isset ( $dadosUbs ['data_alteracao'] )) {
									echo $dadosUbs ['data_alteracao'];
								}
								?>" /></td>
						</tr>


					</table>
					<br> <input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosUbs ['id_ubs'] )) {
							echo $dadosUbs ['id_ubs'];
						}
						?>" /> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
				</form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php')?>