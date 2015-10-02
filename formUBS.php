<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

if (isset ( $_GET ['id'] )) {
	verificarPermissaoPagina ( 'UBS_ALTERAR' );
} else {
	verificarPermissaoPagina ( 'UBS_INSERIR' );
}
?>

<?php

if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$id = $_POST ['id'];
	$ubs_atendimento = $_POST ['ubs_atendimento'];
	$endereco = $_POST ['endereco'];
	$telefone = $_POST ['telefone'];
	$data_insercao = $_POST ['data_insercao'];
	$data_alteracao = $_POST ['data_alteracao'];
		
	if (empty ($id)) {
		$sql = "INSERT INTO ubs (ubs_atendimento, endereco, telefone, data_insercao) 
				VALUES ('{$ubs_atendimento}', '{$endereco}', '{$telefone}', NOW())";
	} else {
		$sql = "UPDATE ubs 
					SET    ubs_atendimento = '{$ubs_atendimento}',
						   endereco = '{$endereco}',
						   telefone = '{$telefone}',
						   data_alteracao = NOW()
                   WHERE   id_ubs = {$id} ";
	}
	
	if ($exec = mysqli_query ( $con, $sql )){	
		header ( 'Location: consultarUBS.php' );
		$_SESSION ['msg'] = 'Registro Salvo Com Sucesso!';}	
		echo "<script>alert(msg);</script>";
	}

// Se exitir um id passado por parametro
if (isset ( $_GET ['id'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	$query = mysqli_query ( $con, "SELECT * FROM ubs WHERE id_ubs = {$_GET['id']} " );
	$dadosUBS = mysqli_fetch_array ( $query );
}
?>

<script type="text/javascript">
$(document).ready(function(){
	    $("input.cpf").mask("999.999.999-99");
        $("input.cep").mask("99999-999");
        $("input.telefone").mask('(99) 9999-9999');
});
</script>

<div class="divTudoFormUBS">
	<div id="tituloPaginaUBSCadastroAlteracao">
		<center><?php echo isset($_GET['id']) ? "Alterar UBS" : "Nova UBS"; ?></center>
	</div>

	<center>
		<div id="formConsultaAtendimento">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto; margin-top: -200px; margin-left: 300px">
				<form method="POST">
					<table width="100%">
						<tr>
							<br />
							<td><label for="ubs_atendimento" style="width: 250px;">Nome da UBS:</label></td>
							<td><input style="width: 300px; margin-bottom: 5px;" type="text" placeholder="Nome da UBS de Atendimento"
								name="ubs_atendimento" id="ubs_atendimento"
								maxlength="50"
								value="<?php
								
								if (isset ( $dadosUBS ['ubs_atendimento'] )) {
									echo $dadosUBS ['ubs_atendimento'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="endereco">Endereço:</label></td>
							<td><input style="width: 500px; margin-bottom: 5px;" type="text"
								name="endereco" id="endereco" maxlength="400"
								value="<?php
								
								if (isset ( $dadosUBS ['endereco'] )) {
									echo $dadosUBS ['endereco'];
								}
								?>" /></td>
						</tr>
						
						<tr>
							<br />
							<td><label for="telefone">Telefone:</label></td>
							<td><input style="width: 150px; margin-bottom: 5px;" type="text"
								name="telefone" class="telefone" id="telefone" maxlength="10" 
								value="<?php
								
								if (isset ( $dadosUBS ['telefone'] )) {
									echo $dadosUBS ['telefone'];
								}
								?>" /></td>
						</tr>

						<tr>
							<br />
							<td><label for="data_insercao">Data de Inser&#231;&#227;o:</label></td>
							<td><input readonly style="width: 100px; margin-bottom: 5px;" type="text"
								name="data_insercao" id="data_insercao" maxlength="10"
								value="<?php
								if (isset ( $dadosUBS ['data_insercao'] )) {
									echo $dadosUBS ['data_insercao'];
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
								if (isset ( $dadosUBS ['data_alteracao'] )) {
									echo $dadosUBS ['data_alteracao'];
								}
								?>" /></td>
						</tr>


					</table>
					<br> <input type="hidden" id="id" name="id"
						value="<?php
						if (isset ( $dadosUBS ['id_ubs'] )) {
							echo $dadosUBS ['id_ubs'];
						}
						?>" /> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
				</form>
			</div>
		</div>
	</center>
</div>
<?php include ('includes/rodape.php')?>