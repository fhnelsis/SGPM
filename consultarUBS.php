<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php verificarPermissaoPagina('UBS_LISTAR'); ?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="divTudoConsultarTipoAtendimento">

	<div id="tituloPagina">Buscar UBS</div>

	<div id="formBuscaTipoAtendimento">
                
		<div class="content-dataTable"
			style="width: 80%; margin: 0 auto; margin-top: -70px; margin-right: 70px" align>
                <?php if (isset($_SESSION['msg'])) : ?>
                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                <table id="pacientes" class="display" cellspacing="0"
				width="100%" content="text/html;charset=utf-8">
				<thead>
					<tr>
						<th>UBS</th>
						<th>Edição</th>
						<th>Exclusão</th>
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
						<td>
                                                    <?php if (verificarPermissao('UBS_ALTERAR')): ?>
                                                        <center><a href="formUBS.php?id=<?php echo $linha['id_ubs']; ?>">Editar</a></center>
                                                    <?php endif; ?>
                                                </td>
						<td>
                                                    <?php if (verificarPermissao('UBS_EXCLUIR')): ?>
                                                        <center><a  href="excluirUBS.php?id_ubs_exclusao=<?php echo $linha['id_ubs']; ?>">Excluir</a></center>
                                                    <?php endif; ?>
                                                </td>
<?php }?>

						</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include ('includes/menuBack.php')?>
<?php include ('includes/rodape.php')?>