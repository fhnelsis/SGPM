<?php include ('includes/cabecalho.php') ?>

    <?php include ('includes/menu.php') ?>


<?php
     if(isset($_GET['id_exclusao'])){
        $con = mysqli_connect("localhost", "root", "", "sgpm");
        mysqli_set_charset($con, "utf8");  
        
        //Inserir alert de confirmação
        $sql = "DELETE FROM paciente WHERE id_paciente = {$_GET['id_exclusao']} ";
        $exec = mysqli_query($con, $sql);
        
        //Verificar alert de exclusão
        $_SESSION['msg'] = 'Registro Excluído Com Sucesso!';
        header('Location: consultarPaciente.php');
    }
    
?>
		<script type="text/javascript">
			jQuery(document).ready(function() {
		    	jQuery('#pacientes').DataTable();
			});
</script>
	<div class="tudo">
		<div id="meio">
			<div id="tituloPagina">
				<h3>Buscar Paciente</h3>
			</div>

			<div id="formBuscaPaciente">
				

			<div class="content-dataTable" style="width: 70%; margin: 0 auto; margin-top: 50px; margin-right: 70px; border: 10px solid black">
                                <?php if (isset($_SESSION['msg'])) : ?>
                                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                                    <?php unset($_SESSION['msg']); ?>
                                <?php endif; ?>
 				<table id="pacientes" class="display" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				            <th>Nome</th>
				            <th>CPF</th>
				            <th>Ações</th>
				        </tr>
				    </thead>

				    <tbody>

				    <?php $con = mysqli_connect("localhost","root","","sgpm") ;
                                          mysqli_set_charset($con,"utf8");
                                    
                                    //Verificar essa query. Saber de onde ela pega o POST para a busca.
				    	  $query = mysqli_query($con, "SELECT * FROM paciente");

				    	  while($linha = mysqli_fetch_array($query)) {
                

				    ?>

				        <tr>
				            <td><?php echo $linha['nome_paciente']; ?></td>
				            <td><?php echo $linha['cpf']; ?></td>
				            <td>     <center>
                                                    <a href="formPaciente.php?id=<?php echo $linha['id_paciente']; ?>">editar</a>
                                                    <a href="buscarPaciente.php?id_exclusao=<?php echo $linha['id_paciente']; ?>">excluir</a>
                                                </center>
                                           
                                            </td>
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
