<?php

$con=mysqli_connect("localhost","root","","sgpm");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    try{
        //Pega os dados do formulario
        $login= $_POST['login'];
        $senha= $_POST['senha'];
        
        // $sql= "SELECT * 
        //          FROM funcionarios
        //          WHERE login = '{$login}' AND
        //                senha = '{$senha}'";

        $sql = mysqli_query($con, "SELECT * FROM funcionario WHERE login = '{$login}' and senha = '{$senha}'");
     
       // $sql = mysqli_query($con, "SELECT 1");
        $row = mysqli_fetch_array($sql);


                       // $sql = "SELECT * FROM funcionarios where $login = login and $senha = senha";

        //$result = mysqli_query($con, $sql); 
    
         //Verifica quantidadede linhas
        $num_rows = mysqli_num_rows($sql);
        
        //Se <> de zero, invalida o acesso
        if($num_rows != 1){
            throw new Exception('Usuário ou senha inválidos');
        }      

        //Pega a linha da memória
        $consulta = mysqli_fetch_array($sql);

        //mysql_close($con);
     
        //Monta a session
        session_name('sistema');
        session_start();
        //$_SESSION['LOGIN']['CODIGO']= $consulta['idadmin'];
        $_SESSION['LOGIN']['NOME']= $consulta['nome'];
        $_SESSION['LOGIN']['USUARIO']= $consulta['usuario'];
       
        //Redireciona após validação
        header('Location: consultarPaciente.php');

    }catch(Exception $e){
        echo "<script>alert('".$e->getMessage()."');</script>";
        echo "<script>window.location='index.php';</script>";
        mysqli_close($con);
    }
?>