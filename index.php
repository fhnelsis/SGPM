<?php include ( 'includes/cabecalho.php')?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="tudo">

	<div class="aviso">
		<a href="" id="logo_home"> <img src="img/aviso.png">
		</a>
	</div>
	<form action="validacao.php" method="post">
		<div class="form">
			<div class="campo">
				<input type="text" name="login" value="Usuário" id="login"
					onfocus="if (this.value == this.defaultValue)
                                    this.value = ''"
					onblur="if (this.value == '')
                                           this.value = this.defaultValue"
					; this.style.color='#000';>
			</div>
			<div class="campo">
				<input type="password" name="senha" value="Senha" id="password"
					onfocus="if (this.value == this.defaultValue)
                                    this.value = ''"
					onblur="if (this.value == '')
                                           this.value = this.defaultValue"
					; this.style.color='#000';>
			</div>
			<div>
				<input type="submit" class="botaologar" name="submit" id="submit"
					value="Logar">
			</div>
		</div>
	</form>

</div>

<?php include ('includes/rodape.php')?>