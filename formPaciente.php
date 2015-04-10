<?php include ('includes/cabecalho.php') ?>
<?php include ('includes/menu.php') ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    $nome = $_POST['nome_paciente'];
    $cpf = $_POST['cpf'];
    $id = $_POST['id'];

    if (empty($id)) {
        $sql = "INSERT INTO paciente (nome_paciente, cpf) VALUES ('{$nome}', '{$cpf}')";
    } else {
        $sql = "UPDATE paciente SET nome_paciente = '{$nome}' , cpf = '{$cpf}' WHERE id_paciente = {$id} ";
    }

    $exec = mysqli_query($con, $sql);
    $_SESSION['msg'] = 'Registro Salvo Com Sucesso!';
    header('Location: consultarPaciente.php');
}


//Se exitir um id passado por parâmetro
if (isset($_GET['id'])) {
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    $query = mysqli_query($con, "SELECT * FROM paciente WHERE id_paciente = {$_GET['id']} ");
    $dadosPaciente = mysqli_fetch_array($query);
}
?>

<div class="tudo">
    <div id="meio">
        <div id="tituloPagina">
            <center><h3><?php echo isset($_GET['id']) ? "Alterar Paciente" : "Cadastrar Paciente"; ?></h3></center>
        </div>

        <center>
            <div id="formBuscaPaciente" >
                <div class="content-dataTable" style="width: 40%; margin: 0 auto; margin-top: 200px; margin-right: 900px">
                    <form method="POST" >
                        <table width="500px">
                            <tr >
                                <td><label for="nome_paciente" >Nome: </label></td>
                                <td><input style="width: 400px;" type="text" name="nome_paciente" id="nome_paciente"  maxlength="50" value="<?php if (isset($dadosPaciente['nome_paciente'])) {
    echo $dadosPaciente['nome_paciente'];
} ?>"/></td>
                            </tr>
                            <tr>
                                <td><label for="cpf">CPF: </label></td>
                                <td><input style="width: 150px;" type="text" name="cpf" id="cpf" maxlength="11" value="<?php if (isset($dadosPaciente['cpf'])) {
    echo $dadosPaciente['cpf'];
} ?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="cpf">RG: </label></td>
                                <td><input type="text" name="rg" id="rg" maxlength="10" value="<?php if (isset($dadosPaciente['rg'])) {
    echo $dadosPaciente['rg'];
} ?>" /></td>
                            </tr>
                            <tr>
                                <td><label for="cpf">CPF: </label></td>
                                <td><input type="text" name="cpf" id="cpf" maxlength="11" value="<?php if (isset($dadosPaciente['cpf'])) {
    echo $dadosPaciente['cpf'];
} ?>" /></td>
                            </tr>
                        </table>

                        <input type="hidden" id="id" name="id" value="<?php
if (isset($dadosPaciente['id_paciente'])) {
    echo $dadosPaciente['id_paciente'];
}
?>" />
                        <input type="submit" name="enviar" value="ENVIAR" />
                    </form>
                </div>
            </div>
        </center>
    </div>
</div>
<?php include ('includes/menuBack.php') ?>
<?php include ('includes/rodape.php') ?>
