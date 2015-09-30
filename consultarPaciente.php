<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php verificarPermissaoPagina('PACIENTE_LISTAR'); ?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="divTudoConsultarPaciente">


	<div id="tituloPagina">Buscar Paciente</div>

	<div id="formBuscaPaciente">


		<div class="content-dataTable"
			style="width: 80%; margin: 0 auto; margin-top: -70px; margin-right: 70px">
                <?php if (isset($_SESSION['msg'])) : ?>
                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                <table id="pacientes" class="display" cellspacing="0"
				width="100%" content="text/html;charset=utf-8">
				<thead>
					<tr>
						<th>Nome</th>
						<th>CPF</th>
						<th><center>Edição</center></th>
						<th><center>Exclusão</center></th>
					</tr>
				</thead>

				<tbody>

<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Verificar essa query. Saber de onde ela pega o POST para a busca.
$ubs_logada = $_SESSION ['LOGIN'] ['UBS'];
$tipo_funcionario_logado = $_SESSION ['LOGIN'] ['TIPO_FUNCIONARIO'];

if ($tipo_funcionario_logado == 1) {
	$query = mysqli_query ( $con, "SELECT * FROM paciente");
} else {
	$query = mysqli_query ( $con, "SELECT * FROM paciente where id_ubs = '" . $ubs_logada . "'" );
}

while ( $linha = mysqli_fetch_array ( $query ) ) {
	?>

                            <tr>
						<td><?php echo $linha['nome_paciente']; ?></td>
						<td><?php echo $linha['cpf']; ?></td>

						<td>
                        	<?php if (verificarPermissao('PACIENTE_ALTERAR')): ?>
                            	<center>
								<a
									href="formPaciente.php?id=<?php echo $linha['id_paciente']; ?>">Editar</a>
							</center>
                            <?php endif; ?>
                        </td>

						<td>
                        	<?php if (verificarPermissao('PACIENTE_EXCLUIR')): ?>
                            	<center>
								<a
									href="excluirPaciente.php?id_exclusao=<?php echo $linha['id_paciente']; ?>">Excluir</a>
							</center>
                            <?php endif; ?>
						</td>
						
<?php }?>

						</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include ('includes/menuBack.php'); ?>
<?php include ('includes/rodape.php'); ?>