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

    $arrayData = explode('/', $_POST['data']);

    $id_agenda = $_POST ['id'];
    $data_hora_inicio =  $arrayData[2] . "-" .  $arrayData[1]. "-" . $arrayData[0] . " " .$_POST['hora_inicio'] ;
    $data_hora_fim = $arrayData[2] . "-" . $arrayData[1]. "-" . $arrayData[0] . " " .$_POST['hora_fim'] ;
    $id_ubs = $_SESSION['LOGIN']['UBS'];
    $id_tipo_atendimento = $_POST['id_tipo_atendimento'];
    $id_funcionario = $_POST['id_funcionario'];
    
    $queryCpfPaciente = mysqli_query ( $con, "SELECT id_paciente FROM paciente WHERE cpf = '{$_POST['cpf_paciente']}' " );
    $paciente = mysqli_fetch_array ( $queryCpfPaciente );
    $id_paciente = $paciente['id_paciente'];
    
    if (empty($id_agenda)) {
        $sql = "INSERT INTO agenda (data_hora_inicio, data_hora_fim, id_ubs, id_tipo_atendimento, id_funcionario, id_paciente) 
				VALUES ('" . $data_hora_inicio . "', '" . $data_hora_fim . "', " . $id_ubs . ", " . $id_tipo_atendimento . ", " . $id_funcionario . ", " . $id_paciente . " )";
    } else {
        $sql = "UPDATE agenda 
					SET    
						   id_agenda = " . $id_agenda . ",
						   data_hora_inicio = '" . $data_hora_inicio . "',
						   data_hora_fim = '" . $data_hora_fim . "',
						   id_ubs = " . $id_ubs . ",
						   id_tipo_atendimento = " . $id_tipo_atendimento . ",
						   id_funcionario = " . $id_funcionario . ",
						   id_paciente = " . $id_paciente . "
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
$queryFuncionario = mysqli_query($con, "SELECT * FROM funcionario where id_tipo_funcionario != 1 and id_ubs = " . $_SESSION ['LOGIN'] ['UBS']);
?>

<script type="text/javascript">
    function validar() {
        $.post("validaPaciente.php", {cpf: $("#cpf_paciente").val()}, function(data) {
            if (data == '0') {
                alert('Informe um CPF de um paciente que esteja cadastrado no sistema!');
                return false;
            }
            
            if ($('#data').val() === "") {
                alert('Informe a data do atendimento!');
                return false;
            }

            if ($('#hora_inicio').val() === "") {
                alert('Informe o horário inicial!');
                return false;
            }
        
            if ($('#hora_fim').val() === "") {
               alert('Informe o horário final!');
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

            if ($('#cpf_paciente').val() === "") {
                alert('Informe o cpf do paciente!');
                return false;
            }


            $('form').submit();
        });
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
            $('.data_only').mask('99/99/9999');
            $('.hora').mask('99:99');
            
             
            $('#cpf_paciente').change(function() {
                $.post("consultarPacienteCpf.php", {cpf_buscado: $("#cpf_paciente").val()}, function(data) {
                        if(data){
                            $('#nome_paciente').html("<strong><i>"+data.nome_paciente+"</i></strong>");
                        }else{
                            alert('Paciente não encontrado');
                            $('#nome_paciente').val("");
                            $('#cpf_paciente').val("");
                        }
                    
                }, 'json');
                
            });
            
        });

    </script>

    <center>
        <div id="formConsultaAtendimento">
            <div style="margin-top: 30px; margin-left: 300px;">
                <form method="POST">
                    <table width="100%">
                        <tr>
                            <td><label for="data">Data do atendimento:</label></td>
                            <td>
                                <input style="width: 150px; margin-top: 5px;" type="text" name="data" class="data_only" id="data" maxlength="15" value="" />
                            </td>
                        </tr>
                        
                        <tr>
                            <td><label for="">Hora do Atendimento:</label></td>
                            <td>
                                <input style="width: 150px; margin-top: 5px;" type="text" name="hora_inicio" class="hora" id="hora_inicio" maxlength="5" value="" />
                                Até:
                                <input style="width: 150px; margin-top: 5px;" type="text" name="hora_fim" class="hora" id="hora_fim" maxlength="5" value="" />
                            </td>
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
                                       ?>" />
                                       <span id="nome_paciente"></span>
                            
                            </td>
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