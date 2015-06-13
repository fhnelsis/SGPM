
<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="divTudoConsultarUbs">


	<div id="tituloPagina">Buscar Unidade B&aacute;sica</div>

	<div id="formBuscaUbs">


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
						<th>Nome da UBS</th>
						<th>Edi&#231;&#228;o</th>
						<th>Exclus&#228;o</th>
					</tr>
				</thead>

				<tbody>

<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Verificar essa query. Saber de onde ela pega o POST para a busca.
$query = mysqli_query ( $con, "SELECT * FROM ubs" );
while ( $linha = mysqli_fetch_array ( $query ) ) {
	?>

                            <tr>
						<td><?php echo $linha['ubs_atendimento']; ?></td>
						<td><center>
								<a
									href="formUbs.php?id=<?php echo $linha['id_ubs']; ?>">Editar</a>
							</center></td>
						<td><center>
								<a
									href="excluirUbs.php?id=<?php echo $linha['id_ubs']; ?>">Excluir</a></td>
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