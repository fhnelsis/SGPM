<?php
if (isset ( $_GET ['id_exclusao'] )) {
	$con = mysqli_connect ( "localhost", "root", "", "sgpm" );
	mysqli_set_charset ( $con, "utf8" );
	
	// Inserir alert de confirma��o
	$sql = "DELETE FROM paciente WHERE id_paciente = {$_GET['id_exclusao']} ";
	$exec = mysqli_query ( $con, $sql );
	
	// Verificar alert de exclus�o
	$_SESSION ['msg'] = 'Registro Exclu�do Com Sucesso!';
	header ( 'Location: consultarPaciente.php' );
	
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
	$_SESSION ['erromsg'] = 'Houve um erro na exclus�o!';
	header ( 'Location: home.php' );
}
?>	