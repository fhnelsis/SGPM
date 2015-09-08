<?php

$con=mysqli_connect("localhost","root","","sgpm");
mysqli_set_charset($con, "utf8");

// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    try{
        //Pega os dados do formulario
        $login= $_POST['login'];
        //$senha= md5($_POST['senha']);
        $senha= $_POST['senha'];
        
        echo $senha;
        
        $sql = mysqli_query($con, "SELECT func.*, tp.nome_tipo FROM funcionario func INNER JOIN tipo_funcionario tp ON tp.id_tipo_funcionario = func.id_tipo_funcionario WHERE login = '{$login}' and senha = '{$senha}'");
     
       // $row = mysqli_fetch_array($sql);

         //Verifica quantidadede linhas
        $num_rows = mysqli_num_rows($sql);
        
        //Se <> de zero, invalida o acesso
        if($num_rows != 1){
            throw new Exception('Usuário ou senha inválidos!');
        }      

        //Pega a linha da memória
        $consulta = mysqli_fetch_array($sql);

        //Busca as permissões desse usuário de acordo com o seu tipo
        $queryPermissoes = mysqli_query($con, "SELECT TRIM(func.sigla_funcionalidade) sigla_funcionalidade FROM tipo_funcionario_funcionalidade tpf INNER JOIN funcionalidades func ON func.id_funcionalidade = tpf.id_funcionalidade WHERE tpf.id_tipo_funcionario = ".$consulta['id_tipo_funcionario']." ");
        
        //Monta a session
        //session_name('sistema');
        session_start();
        
        //$_SESSION['LOGIN']['CODIGO']= $consulta['idadmin'];
        $_SESSION['LOGIN']['NOME']= $consulta['nome_funcionario'];
        $_SESSION['LOGIN']['CARGO']= $consulta['nome_tipo'];
        $_SESSION['LOGIN']['USUARIO']= $consulta['login'];
        
        //Cria o array que receberá as permissões do usuário
        $arrayPermissoes = array();
        
        while($linhaPermissoes = mysqli_fetch_array($queryPermissoes)){
            $arrayPermissoes[] = $linhaPermissoes['sigla_funcionalidade'];
        }
        
        $_SESSION['LOGIN']['PERMISSOES'] = $arrayPermissoes;
               
        //Redireciona após validação
        header('Location: home.php');

    }catch(Exception $e){
        echo "<script>alert('".$e->getMessage()."');</script>";
        echo "<script>window.location='index.php';</script>";
        mysqli_close($con);
    }
?>