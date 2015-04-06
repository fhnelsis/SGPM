<?php
	include ('includes/cabecalho.php')
?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
		    	jQuery('#pacientes').DataTable();
			});
</script>
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

			<div class="content-dataTable" style="width: 80%; margin: 0 auto; margin-top: 50px; ">
 				<table id="pacientes" class="display" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>Nome</th>
				            <th>Idade</th>
				            <th>Gênero</th>
				            <th>Data de Nascimento</th>
				            <th>Ações</th>
				        </tr>
				    </thead>
				    



				    <tbody>

				    <?php $con = mysqli_connect();
				    	  $query = mysqli_query($con, "SELECT WEFWFE");

				    	  while($linha = mysqli_fetch_array(query)) {

				    ?>

				        <tr>
				            <td><?php echo $linha['nome']; ?></td>
				            <td><?php echo $linha['idade']; ?></td>
				            <td><?php echo $linha['genero']; ?></td>
				            <td><?php echo $linha['data_nascimento']; ?></td>
				            <td><a href="form.php?id="<?php echo $linha['id']; ?>>editar</a></td>
				        </tr>

				        <?php } ?>
				    </tbody>
            </table>
			</div>
</div>
		</div>
	</div>
	<?php
	include ('includes/rodape.php')
	?>
