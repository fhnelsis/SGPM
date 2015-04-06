<?php
	include ('includes/cabecalho.php')
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<div class="tudo">
		<div id="meio">
			<div id="tituloPagina">
				<h3>Buscar Paciente</h3>
			</div>

			<div id="formBuscaPaciente">
				<form action="buscarPaciente.php" method="post">
 					Nome: <input type="text" name="nome"><br>
 					&nbsp;&nbsp;CPF: <input type="text" name="cpf"><br>
 						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 						<input type="submit">
 				</form>

			</div>

		</div>
	</div>
	<?php
	include ('includes/rodape.php')
	?>
