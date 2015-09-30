<?php include ('includes/cabecalho.php')?>
<?php include ('includes/menu.php')?>
<?php verificarPermissaoPagina('FUNCIONARIO_LISTAR'); ?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>

<div class="divTudoConsultarPaciente">
	<div id="tituloPagina">Buscar Funcionário</div>
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
						<th>Cargo</th>
						<th>Edi&#231;&#228;o</th>
						<th>Exclus&#228;o</th>
					</tr>
				</thead>

				<tbody>

<?php

$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
mysqli_set_charset ( $con, "utf8" );

// Verificar essa query. Saber de onde ela pega o POST para a busca.
$query = mysqli_query ( $con, "SELECT fun.*, tp_fun.nome_tipo FROM funcionario fun INNER JOIN tipo_funcionario tp_fun ON fun.id_tipo_funcionario = tp_fun.id_tipo_funcionario" );
while ( $linha = mysqli_fetch_array ( $query ) ) {
	?>

             	   <tr>
						<td><?php echo $linha['nome_funcionario']; ?></td>
						<td><?php echo $linha['nome_tipo']; ?></td>
						
						<td>
							<?php if (verificarPermissao('FUNCIONARIO_ALTERAR')): ?>
                            <center><a href="formFuncionario.php?id_funcionario=<?php echo $linha['id_funcionario']; ?>">Editar</a></center>
                            <?php endif; ?>
                            
                                                    <?php if (verificarPermissao('FUNCIONARIO_DETALHES')): ?>
                            <a href="formFuncionario.php?id=<?php echo $linha['id_funcionario']; ?>&detalhes=1">Detalhes</a>
                        <?php endif; ?>
                       
                        	<?php if (verificarPermissao('FUNCIONARIO_ALTERAR')): ?>
                            <center><a href="excluirFuncionario.php?id_exclusao=<?php echo $linha['id_funcionario']; ?>">Excluir</a></center>
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