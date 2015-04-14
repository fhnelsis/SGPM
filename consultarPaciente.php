
<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>


<?php
if (isset ( $_GET ['id_exclusao'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	// Inserir alert de confirmação
	$sql = "DELETE FROM paciente WHERE id_paciente = {$_GET['id_exclusao']} ";
	$exec = mysqli_query ( $con, $sql );
	
	// Verificar alert de exclusão
	$_SESSION ['msg'] = 'Registro Excluído Com Sucesso!';
	header ( 'Location: consultarPaciente.php' );
}
?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="tudo">
	
		<div id="tituloPagina">
			Buscar Paciente
		</div>

		<div id="formBuscaPaciente">


			<div class="content-dataTable"
				style="width: 80%; margin: 0 auto; margin-top: -70px; margin-right: 70px">
                <?php if (isset($_SESSION['msg'])) : ?>
                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                <table id="pacientes" class="display" cellspacing="0"
					width="100%">
					<thead>
						<tr>
							<th>Nome</th>
							<th>CPF</th>
							<th>Edição</th>
							<th>Exclusão</th>
						</tr>
					</thead>

					<tbody>

<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Verificar essa query. Saber de onde ela pega o POST para a busca.
$query = mysqli_query ( $con, "SELECT * FROM paciente" );
while ( $linha = mysqli_fetch_array ( $query ) ) {
	?>

                            <tr>
							<td><?php echo $linha['nome_paciente']; ?></td>
							<td><center><?php echo $linha['cpf']; ?></center></td>
							<td><center>
									<a
										href="formPaciente.php?id=<?php echo $linha['id_paciente']; ?>">Editar</a>
								</center></td>
							<td><center>
									<a
										href="buscarPaciente.php?id_exclusao=<?php echo $linha['id_paciente']; ?>">Excluir</a></td>
							</center>
<?php }?>

						</tr>
					</tbody>
				</table>
			</div>
		</div>
	
</div>
<?php include ('includes/menuBack.php')?>
<?php include ('includes/rodape.php')?>