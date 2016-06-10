<?php include ('includes/cabecalho.php') ?>
<?php include ('includes/menu.php') ?>
<?php include ('includes/menuBack.php') ?>
<?php
//if (isset ( $_GET ['id'] ) && ! isset ( $_GET ['detalhes'] )) {
//	verificarPermissaoPagina ( 'ATENDIMENTO_ALTERAR' );
//} else if (isset ( $_GET ['id'] ) && isset ( $_GET ['detalhes'] )) {
//	verificarPermissaoPagina ( 'ATENDIMENTO_DETALHES' );
//} else {
//	verificarPermissaoPagina ( 'ATENDIMENTO_INSERIR' );
//}
?>
<?php
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    $arrDataInicio = explode(' ', $_POST['data_hora_inicio']);
    $arrDataFim = explode(' ', $_POST['data_hora_fim']);
    
    $arrayDataInicio = explode('/', $arrDataInicio[0]);
    $arrayDataFim = explode('/', $arrDataInicio[0]);
    

    $id_agenda = $_POST ['id'];
    $data_hora_inicio =  $arrayDataInicio[2] . "-" .  $arrayDataInicio[1]. "-" . $arrayDataInicio[0] . " " .$arrDataInicio[1] ;
    $data_hora_fim = $arrayDataFim[2] . "-" . $arrayDataFim[1]. "-" . $arrayDataFim[0] . " " .$arrDataFim[1] ;
    $id_ubs = $_SESSION['LOGIN']['UBS'];
    $id_tipo_atendimento = $_POST['id_tipo_atendimento'];
    $id_funcionario = $_POST['id_funcionario'];
    $nome_paciente = $_POST['nome_paciente'];
    $cpf_paciente = $_POST['cpf_paciente'];
    
    if (empty($id_agenda)) {
        $sql = "INSERT INTO agenda (data_hora_inicio, data_hora_fim, id_ubs, id_tipo_atendimento, id_funcionario, nome_paciente, cpf_paciente) 
				VALUES ('" . $data_hora_inicio . "', '" . $data_hora_fim . "', " . $id_ubs . ", " . $id_tipo_atendimento . ", " . $id_funcionario . ", '" . $nome_paciente . "', '" . $cpf_paciente . "' )";
    } else {
        $sql = "UPDATE agenda 
					SET    
						   id_agenda = " . $id_agenda . ",
						   data_hora_inicio = '" . $data_hora_inicio . "',
						   data_hora_fim = '" . $data_hora_fim . "',
						   id_ubs = " . $id_ubs . ",
						   id_tipo_atendimento = " . $id_tipo_atendimento . ",
						   id_funcionario = " . $id_funcionario . ",
						   nome_paciente = '" . $nome_paciente . "',
						   cpf_paciente = '" . $cpf_paciente . "'
                   WHERE   id_agenda = {$id_agenda} ";
    }


    $exec = mysqli_query($con, $sql);
    $_SESSION['msg'] = 'Registro Salvo Com Sucesso!';
    
    echo "<script type='text/javascript'>location.href='consultarAgenda.php';</script>";die();
}

// Busca os tipos de atendimento
$con = mysqli_connect("localhost", "root", "", "sgpm");
mysqli_set_charset($con, "utf8");

// Busca os tipos de atendimento
$queryTipos = mysqli_query($con, "SELECT * FROM tipo_atendimento");

// Busca os funcionários
$queryFuncionario = mysqli_query($con, "SELECT * FROM funcionario where id_tipo_funcionario = 1 and id_ubs = " . $_SESSION ['LOGIN'] ['UBS']);
?>

<script type="text/javascript">
    function validar() {

        if ($('#data_hora_inicio').val() === "") {
            alert('Informe a data o hora de início do atendimento!');
            return false;
        }

        if ($('#data_hora_fim').val() === "") {
            alert('Informe a data o hora de final do atendimento!');
            return false;
        }

        if ($('#id_funcionario').val() === "") {
            alert('Informe o funcionário!');
            return false;
        }

        if ($('#id_tipo_atendimento').val() === "") {
            alert('Informe o tipo de atendimento!');
            return false;
        }

        if ($('#nome_paciente').val() === "") {
            alert('Informe o nome do paciente!');
            return false;
        }

        if ($('#cpf_paciente').val() === "") {
            alert('Informe o cpf do paciente!');
            return false;
        }


        $('form').submit();
    }

<?php if (isset($_GET['detalhes'])): ?>
        $(document).ready(function () {
            $('input, select, textarea').attr('disabled', true);
        });
<?php endif; ?>

</script>
<div class="divTudoFormAtendimento">
    <div id="tituloPaginaAtendimentoCadastroAlteracao">
        <center>

            <?php
            if (isset($_GET ['id']) && !isset($_GET ['detalhes'])) {
                echo "Alterar Agenda";
            } else if (isset($_GET ['id']) && isset($_GET ['detalhes'])) {
                echo "Visualizar Agenda";
            } else {
                echo "Nova Agenda";
            }
            ?>
        </center>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("input.cpf").mask("999.999.999-99");
            $("input.cep").mask("99999-999");
            $("input.data").mask("99/99/9999 99:99");
        });

    </script>

    <center>
        <div id="formConsultaAtendimento">
            <div style="margin-top: 30px; margin-left: 300px;">
                <form method="POST">
                    <table width="100%">
                        <tr>
                            <td><label for="data_hora_inicio">Data de início do Atendimento:</label></td>
                            <td><input style="width: 150px; margin-top: 5px;" type="text"
                                       name="data_hora_inicio" class="data" id="data_hora_inicio" maxlength="15" 
                                       value="<?php
//                                                        if (isset($dadosAtendimento['cpf_paciente'])) {
//                                                            echo $dadosAtendimento['cpf_paciente'];
//                                                        }
                                       ?>" /></td>
                        </tr>

                        <tr>
                            <td><label for="data_hora_fim">Data de Término do Atendimento:</label></td>
                            <td><input style="width: 150px; margin-top: 5px;" type="text"
                                       name="data_hora_fim" class="data" id="data_hora_fim" maxlength="15" 
                                       value="<?php
//                                                        if (isset($dadosAtendimento['cpf_paciente'])) {
//                                                            echo $dadosAtendimento['cpf_paciente'];
//                                                        }
                                       ?>" /></td>
                        </tr>

                        <tr>
                            <td><label for="nome_paciente">Nome Paciente:</label></td>
                            <td><input style="width: 400px; margin-top: 5px;" type="text"
                                       name="nome_paciente"  id="nome_paciente"  
                                       value="<?php
//                                                        if (isset($dadosAtendimento['cpf_paciente'])) {
//                                                            echo $dadosAtendimento['cpf_paciente'];
//                                                        }
                                       ?>" /></td>
                        </tr>

                        <tr>
                            <td><label for="cpf">CPF Paciente:</label></td>
                            <td><input style="width: 150px; margin-top: 5px;" type="text"
                                       name="cpf_paciente" class="cpf" id="cpf_paciente" 
                                       style="width: 400px; margin-top: 5px;"
                                       value="<?php
//                                                        if (isset($dadosAtendimento['cpf_paciente'])) {
//                                                            echo $dadosAtendimento['cpf_paciente'];
//                                                        }
                                       ?>" /></td>
                        </tr>

                        <!-- Tipo de Atendimento -->
                        <tr>
                            <td><label for="id_tipo_atendimento">Tipo Atendimento:</label></td>
                            <td><select name="id_tipo_atendimento" id="id_tipo_atendimento"
                                        style="width: 200px; margin-top: 5px;">
                                    <option value="" selected></option>
                                    <?php while ($linhaAtendimento = mysqli_fetch_array($queryTipos)): ?>
                                        <option
                                        <?php //if (isset($dadosAtendimento['id_tipo_atendimento']) && $dadosAtendimento['id_tipo_atendimento'] == $linhaAtendimento['id_tipo_atendimento']) : ?>
                                        <?php //endif; ?>
                                            value="<?php echo $linhaAtendimento['id_tipo_atendimento']; ?>"><?php echo $linhaAtendimento['nome_tipo_atendimento']; ?></option>
                                        <?php endwhile; ?>
                                </select></td>
                        </tr>

                        </td>
                        </tr>

                        <!-- Funcionário  -->
                        <tr>
                            <td><label for="id_funcionario">Funcionário:</label></td>
                            <td><select name="id_funcionario" id="id_funcionario"
                                        style="width: 300px; margin-top: 5px;">
                                    <option value="" selected></option>
                                    <?php while ($linhaFuncionario = mysqli_fetch_array($queryFuncionario)): ?>
                                        <option
                                        <?php //if (isset($dadosAtendimento['id_funcionario']) && $dadosAtendimento['id_funcionario'] == $linhaFuncionario['id_funcionario']) : ?>
                                                 <?php //endif; ?>
                                            value="<?php echo $linhaFuncionario['id_funcionario']; ?>"><?php echo $linhaFuncionario['nome_funcionario']; ?></option>
                                        <?php endwhile; ?>
                                </select></td>

                    </table>
                    <br> <input type="hidden" id="id" name="id" value="<?php //echo isset($dadosAtendimento['id_atendimento']) ? $dadosAtendimento['id_atendimento'] : "";  ?>" /> 

                    <?php if (!isset($_GET['detalhes'])): ?>
                        <input type="button" name="enviar"
                               value="ENVIAR" id="enviar_cadastro" onclick="validar()" />
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </center>
</div>
<?php include ('includes/rodape.php') ?>