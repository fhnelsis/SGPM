<?php include ('includes/cabecalho.php') ?>
<?php include ('includes/menu.php') ?>
<?php //verificarPermissaoPagina('ATENDIMENTO_LISTAR');      ?>
<?php
    // Busca os tipos de atendimento
    $con = mysqli_connect("localhost", "root", "", "sgpm");
    mysqli_set_charset($con, "utf8");

    // Busca os tipos de atendimento
    $queryAgenda = mysqli_query($con, "SELECT ag.*, func.nome_funcionario, tp.nome_tipo_atendimento,  DATE_FORMAT(ag.data_hora_inicio, '%Y-%m-%dT%H:%i') data_inicio, DATE_FORMAT(ag.data_hora_fim, '%Y-%m-%dT%H:%i') data_fim
                                        FROM 
                                                agenda ag
                                        INNER JOIN
                                                funcionario func
                                                ON func.id_funcionario = ag.id_funcionario 
                                        INNER JOIN
                                                tipo_atendimento tp
                                                ON tp.id_tipo_atendimento = ag.id_tipo_atendimento  WHERE ag.id_ubs = {$_SESSION['LOGIN']['UBS']} ");
    $arrAgenda = array();
    
    while($linha = mysqli_fetch_array($queryAgenda)){
        $arrAgenda[] = $linha;
    }
    
?>
<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery('.agenda-calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2016-05-12',
            lang: 'pt-br',
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php foreach($arrAgenda as $agenda): ?>
                    <?php $i = 1; ?>
                    {
                        title: "<?php echo $agenda['nome_tipo_atendimento']." - ".$agenda['nome_funcionario']; ?>",
                        start: "<?php echo $agenda['data_inicio']; ?>",
                        end: "<?php echo $agenda['data_fim']; ?>"

                    }
                    <?php if($i < count($arrAgenda)): ?>
                        ,
                    <?php endif; ?>
                        
                    <?php $i++; ?>
                <?php endforeach; ?>
               
            ]
        });

    });

</script>

<div class="divTudoConsultarAtendimento">
    <div id="tituloPagina">Agenda de Atendimentos</div>
    <div id="formBuscaAtendimento">

        <div class="content-dataTable"
             style="width: 80%; margin: 0 auto; margin-top: -70px; margin-right: 70px;">
<?php if (isset($_SESSION['msg'])) : ?>
                <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                     <?php unset($_SESSION['msg']); ?>
            <?php endif; ?>


        </div>

    </div>
    <div class="agenda-calendar" style="margin-top: 30px; margin-left: 250px; position: absolute; z-index: 0; width: 1080px;"></div>
</div>
<?php include ('includes/menuBack.php') ?>
<?php include ('includes/rodape.php') ?>