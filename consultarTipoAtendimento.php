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
						
						<?php if (verificarPermissao('TIPO_ATENDIMENTO_DETALHES')): ?>
						<th><center>Visualizar</center></th>
						<?php endif; ?>
						
						<?php if (verificarPermissao('TIPO_ATENDIMENTO_ALTERAR')): ?>
						<th><center>Edição</center></th>
						<?php endif; ?>
						
						<?php if (verificarPermissao('TIPO_ATENDIMENTO_EXCLUIR')): ?>
						<th><center>Exclusão</center></th>
						<?php endif; ?>
							
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
		
		<?php if (verificarPermissao('TIPO_ATENDIMENTO_DETALHES')): ?>
		<td>
        <center><a href="formTipoAtendimento.php?id=<?php echo $linha['id_tipo_atendimento']; ?>&detalhes=1">Detalhes</a></center>
        </td>
		<?php endif; ?>
       	
		<?php if (verificarPermissao('TIPO_ATENDIMENTO_ALTERAR')): ?>
		<td>
        <center><a href="formTipoAtendimento.php?id=<?php echo $linha['id_tipo_atendimento']; ?>">Editar</a></center>
        </td>
        <?php endif; ?>
		
		<?php if (verificarPermissao('TIPO_ATENDIMENTO_EXCLUIR')): ?>
		<td>
        <center><a  href="excluirTipoAtendimento.php?id_tipo_atendimento_exclusao=<?php echo $linha['id_tipo_atendimento']; ?>">Excluir</a></center>
        </td>
        <?php endif; ?>
        
<?php }?>
						</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<?php include ('includes/menuBack.php')?>
<?php include ('includes/rodape.php')?>