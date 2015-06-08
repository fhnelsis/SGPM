<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php include ('includes/menuBack.php')?>
<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

?>

<div class="divTudoFormAtendimento">
	<div id="tituloPagina">
		<center>
				<?php echo isset($_GET['id']) ? "Alterar Atendimento" : "Novo Atendimento"; ?>
			</center>
	</div>

	<center>
	<form action="validacaoPacienteAtendimento.php" method="post">
		<div id="formAtendimento">
			<div class="content-dataTable" style="width: 40%; margin: 0 auto">
				<form method="POST">
					<table width="100%">
						<tr>
							<td><label for="cpf">CPF do Paciente:</label></td>
							<td><input style="margin-bottom: 5px;" type="text" name="cpf" id="cpf" maxlength="11" /></td>
						</tr>
					</table>
					<br> <input type="submit" name="enviar" value="ENVIAR"
						id="enviar_cadastro" />
				</form>
			</div>
		</div>
		
</div>
<?php include ('includes/rodape.php')?>