<?

if (isset($_SESSION['login'])) {

}else{header('Location: index.php')
echo "Usuário/Senha Inválido!";}


?>

<html>
	<head>
		<title>Invest Dream - Sistema de Gerenciamento</title>
		<LINK href="StyleSheet.css" rel="stylesheet" type="text/css">
		<style type="text/css">
		.auto-style1 {
			font-size: x-small;
		}
		</style>
	</head>

<body leftmargin="0" topmargin="0">






	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="-moz-box-shadow: 0 0 5px #000; -webkit-box-shadow: 0 0 5px#000; box-shadow: 0 0 5px #000; border-bottom:#FF4B00 solid 5px;">
		<tr>
		    <td bgcolor="#333333" background="images/fundo1_borda_bottom.png" style="height: 82px"><font size="4" color="#FFFFFF"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php"><img src="images/logofundo.png" border="0" style="margin-top:10px;"></a>&nbsp; </strong></font></td>
  		</tr>
	</table>


	<footer>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#333333" style="border-top:2px solid #FF4B00;">
    <tbody>
        <tr>
          <td>
	<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" style="height: 60px; bottom: 0px;">
    <tbody>
        <tr>
          <td>
            <br><br>
  <table width="70%" border="0" align="center" cellpadding="3" cellspacing="3" style="border-top:2px solid #FF4B00;">
    <tbody><tr>
          <td>
            <div align="center" class="auto-style1"><font color="#FFFFFF">Copyright &copy; 2013 INVEST DREAM. Todos os direitos reservados.</font></div></td>
          </tr>
    </tbody>
  </table>
<br>
          </td>
        </tr>
    </tbody>
  </table>
          </td>
        </tr>
      </tbody>
    </table>
</footer>	

</body>

</html>