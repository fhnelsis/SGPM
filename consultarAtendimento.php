<?php include ('includes/cabecalho.php') ?>
<?php include ('includes/menu.php') ?>
<?php verificarPermissaoPagina('ATENDIMENTO_LISTAR'); ?>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('#pacientes').DataTable();
    });
    
</script>
<div class="divTudoConsultarAtendimento">
    <div id="tituloPagina">Buscar Atendimento</div>
	    <div id="formBuscaAtendimento">

        <div class="content-dataTable"
             style="width: 80%; margin: 0 auto; margin-top: -70px; margin-right: 70px">
                 <?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                <?php unset($_SESSION['msg']); ?>
            <?php endif; ?>
            <table id="pacientes" class="display" cellspacing="0"
                   width="100%" content="text/html;charset=utf-8">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Data do Atendimento</th>
                        <?php if (verificarPermissao('ATENDIMENTO_DETALHES')): ?>
                        <th><center>Detalhes</center></th>
                        <?php endif; ?>
                        <?php if (verificarPermissao('ATENDIMENTO_ALTERAR')): ?>
                        <th><center>Edição</center></th>
                        <?php endif; ?>
                        <?php if (verificarPermissao('ATENDIMENTO_EXCLUIR')): ?>
                        <th><center>Exclusão</center></th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $con = mysqli_connect("localhost", "root", "", "sgpm");
                    mysqli_set_charset($con, "utf8");

                    // Verificar essa query. Saber de onde ela pega o POST para a busca.
                    //$query = mysqli_query($con, "SELECT at.*, DATE_FORMAT(at.data_atendimento, '%d/%m/%Y') data_atendimento, fun.nome_funcionario FROM atendimento at INNER JOIN funcionario fun ON fun.id_funcionario = at.id_funcionario ");
                    $query = mysqli_query($con, "SELECT at.*, Date_format(at.data_atendimento, '%d/%m/%Y') data_atendimento, fun.nome_funcionario, pac.nome_paciente FROM   atendimento at        INNER JOIN funcionario fun ON fun.id_funcionario = at.id_funcionario inner join paciente pac on pac.id_paciente = at.id_paciente;   ");
                    while ($linha = mysqli_fetch_array($query)) {
                        ?>

                <tr>
                   <td><?php echo $linha['nome_paciente']; ?></td>
                   <td><?php echo $linha['data_atendimento']; ?></td>
                    
                    <?php if (verificarPermissao('ATENDIMENTO_DETALHES')): ?>
                    <td>
                    <center><a href="formAtendimento.php?id=<?php echo $linha['id_atendimento']; ?>&detalhes=1">Detalhes</a></center>
                    </td>
                    <?php endif; ?>
                        
                    <?php if (verificarPermissao('ATENDIMENTO_ALTERAR')): ?>
                    <td>
                    <center><a href="formAtendimento.php?id=<?php echo $linha['id_atendimento']; ?>">Editar</a></center>
                    </td>
                    <?php endif; ?>
                                                   
                    <?php if (verificarPermissao('ATENDIMENTO_EXCLUIR')): ?>
                    <td>
                    <center><a href="excluirAtendimento.php?id_excluido=<?php echo $linha['id_atendimento']; ?>">Excluir</a></center>
                    </td>
                    <?php endif; ?>
                    
                <?php } ?>

                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?php include ('includes/menuBack.php') ?>
<?php include ('includes/rodape.php') ?>