<?php
if (isset ( $_GET ['id_ubs_exclusao'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	// Inserir alert de confirmação
	$sql = "DELETE FROM ubs WHERE id_ubs = {$_GET['id_ubs_exclusao']}";
	
	if ($exec = mysqli_query ( $con, $sql )) {
		
		// Verificar alert de exclusão
		header ( 'Location: consultarUBS.php' );
		$_SESSION ['msg'] = 'Registro Excluído Com Sucesso!';
				
		?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#pacientes').DataTable();
    });
    </script>
<div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
<?php unset($_SESSION['msg']); ?>
	
	
	<?php
	} else {
		$_SESSION ['erromsg'] = 'Houve um erro na exclusão!';
		header ( 'Location: home.php' );
	}
}