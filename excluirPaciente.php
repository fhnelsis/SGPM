 <a class="alert" href=#>Alert!</a></p>
 
    <!-- JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
 
    <!-- bootbox code -->
    <script src="bootbox.min.js"></script>
    <script>
        $(document).on("click", ".alert", function(e) {
            bootbox.alert("Hello world!", function() {
                console.log("Alert Callback");
            });
        });
    </script>
    
    
    
    

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
$_SESSION ['erromsg'] = 'Houve um erro na exclusão!';
header ( 'Location: home.php' );
?>	