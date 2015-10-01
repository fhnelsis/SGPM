<?php
session_start ();
include ('includes/funcoes_permissao.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>SGPM - Sistema Gerenciador de Prontuários Médicos</title>

<LINK href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/dataTables.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<script type="text/javascript" language="javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" language="javascript" src="js/dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/highchart/highcharts.js"></script>
<script type="text/javascript" language="javascript" src="js/highchart/highcharts-3d.js"></script>
<script type="text/javascript" language="javascript" src="js/highchart/modules/exporting.js"></script>
<script type="text/javascript" language="javascript" src="js/menu.js"></script>
<script type="text/javascript" src="jquery.js"></script>

</head>

<body style="background-image: url(img/background_su.jpg);">
	<div class="cabecalho">
		<a href="home.php"> <img src="img/sgpm_logo2_fundoless_pequeno.png"
			class="logo"></a>
            <?php if (isset($_SESSION['LOGIN'])): ?>
                <div class="apresentacao">
			
			<?php if ($_SESSION ['LOGIN'] ['TIPO_FUNCIONARIO'] == 1): ?>
				<strong>Bem-vindo, <?php echo $_SESSION ['LOGIN'] ['NOME'] . " - " . $_SESSION ['LOGIN'] ['CARGO']; ?></strong>
			<?php endif; ?>
			
			<?php if ($_SESSION ['LOGIN'] ['TIPO_FUNCIONARIO'] != 1): ?>
				<strong>Bem-vindo, <?php echo utf8_encode($_SESSION ['LOGIN'] ['NOME'] . " - " . $_SESSION ['LOGIN'] ['CARGO'] . " - " . $_SESSION ['LOGIN'] ['NOME_UBS']); ?></strong>
			<?php endif; ?>

		</div>
		<div class="wrapLogoutButton">
			<a class="logoutButton" href="logout.php">Logout</a>
		</div>
            <?php endif; ?>
        </div>