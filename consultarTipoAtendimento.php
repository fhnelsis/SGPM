<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php verificarPermissaoPagina('TIPO_ATENDIMENTO_LISTAR'); ?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="divTudoConsultarTipoAtendimento">


	<div id="tituloPagina">Buscar Tipo de Atendimento</div>

	<div id="formBuscaTipoAtendimento">
                
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
						<th>Tipo de Atendimento</th>
						<th>Edi&#231;&#228;o</th>
						<th>Exclus&#228;o</th>
					</tr>
				</thead>

				<tbody>

<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Verificar essa query. Saber de onde ela pega o POST para a busca.
$query = mysqli_query ( $con, "SELECT * FROM tipo_atendimento" );
while ( $linha = mysqli_fetch_array ( $query ) ) {
	?>

                            <tr>
						<td><?php echo $linha['nome_tipo_atendimento']; ?></td>
						<td>
                                                    <?php if (verificarPermissao('TIPO_ATENDIMENTO_ALTERAR')): ?>
                                                        <center><a href="formTipoAtendimento.php?id=<?php echo $linha['id_tipo_atendimento']; ?>">Editar</a></center>
                                                    <?php endif; ?>
                                                </td>
						<td>
                                                    <?php if (verificarPermissao('TIPO_ATENDIMENTO_EXCLUIR')): ?>
                                                        <center><a  href="excluirTipoAtendimento.php?id_tipo_atendimento_exclusao=<?php echo $linha['id_tipo_atendimento']; ?>">Excluir</a></center>
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