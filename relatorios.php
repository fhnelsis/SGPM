<?php include ('includes/cabecalho.php'); ?>
<?php include ('includes/menu.php'); ?>
<?php verificarPermissaoPagina('RELATORIO'); ?>
<?php
//Realiza a conexão
$con = mysqli_connect("localhost", "root", "", "sgpm");
mysqli_set_charset($con, "utf8");

//Busca os tipos de atendimento
$queryTipos = mysqli_query($con, "SELECT * FROM tipo_atendimento");

//Busca os funcionários
$queryFuncionario = mysqli_query($con, "SELECT * FROM funcionario");
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Monta o sql 
    $sqlBusca = "SELECT COUNT(ate.id_atendimento) as total_atendimento, tp.nome_tipo_atendimento FROM atendimento ate INNER JOIN tipo_atendimento tp ON tp.id_tipo_atendimento = ate.id_tipo_atendimento WHERE 1 = 1 ";
    $dadosGrafico = "   ";

    if (!empty($_POST['periodo_inicial'])) {
        $sqlBusca .= " AND ate.data_atendimento >= '{$_POST['periodo_inicial']}'  ";
        $dataInicial = new \DateTime($_POST['periodo_inicial']);
        $dadosGrafico .= "De: " . $dataInicial->format('d/m/Y') . " - ";
    }

    if (!empty($_POST['periodo_final'])) {
        $sqlBusca .= " AND ate.data_atendimento <= '{$_POST['periodo_final']}' ";
        $dataInicial = new \DateTime($_POST['periodo_final']);
        $dadosGrafico .= "Até: " . $dataInicial->format('d/m/Y') . " - ";
    }

    if (!empty($_POST['id_tipo_atendimento'])) {
        $queryAtendimento = mysqli_query($con, "SELECT nome_tipo_atendimento FROM tipo_atendimento WHERE id_tipo_atendimento = " . $_POST['id_tipo_atendimento'] . " ");
        $dadosAtendimento = mysqli_fetch_array($queryAtendimento);
        $sqlBusca .= " AND ate.id_tipo_atendimento = " . $_POST['id_tipo_atendimento'] . " ";
        $dadosGrafico .= $dadosAtendimento['nome_tipo_atendimento'] . " - ";
    }

    if (!empty($_POST['id_funcionario'])) {
        $queryFuncionarios = mysqli_query($con, "SELECT nome_funcionario FROM funcionario WHERE id_funcionario = " . $_POST['id_funcionario'] . " ");
        $dadosFuncionario = mysqli_fetch_array($queryFuncionarios);
        $sqlBusca .= " AND ate.id_funcionario = " . $_POST['id_funcionario'] . " ";
        $dadosGrafico .= $dadosFuncionario['nome_funcionario'] . " - ";
    }

    //Retira os ultimos caracteres da string
    $dadosGrafico = substr($dadosGrafico, 0, strlen($dadosGrafico) - 3);

    //Monta o agrupamento
    $sqlBusca .= " GROUP BY ate.id_tipo_atendimento";

    //Executa a query
    $queryBusca = mysqli_query($con, $sqlBusca);
}
?>


<div class="divTudoRelatorio">
    <h1>Relatórios Gerenciais</h1>
    <div class="filtros">
        <form method="post">
            <select name="id_tipo_atendimento" id="id_tipo_atendimento" style="margin-top: 5px; ">
                <option value="" selected>TIPO DE ATENDIMENTO</option>
                <?php while ($linhaTipoAtendimento = mysqli_fetch_array($queryTipos)): ?>
                    <option value="<?php echo $linhaTipoAtendimento['id_tipo_atendimento']; ?>"><?php echo $linhaTipoAtendimento['nome_tipo_atendimento']; ?></option>
                <?php endwhile; ?>
            </select>

            <select name="id_funcionario" id="id_funcionario" style="margin-top: 5px; ">
                <option value="" selected>FUNCIONÁRIO</option>
                <?php while ($linhaFuncionario = mysqli_fetch_array($queryFuncionario)): ?>
                    <option value="<?php echo $linhaFuncionario['id_funcionario']; ?>"><?php echo $linhaFuncionario['nome_funcionario']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="periodo_inicial">De: <input type="date" name="periodo_inicial" id="periodo_inicial" /></label>
            <label for="periodo_final">Até: <input type="date"  name="periodo_final"   id="periodo_final" /></label>
            <input type="submit" value="BUSCAR" />
        </form>
    </div>

    <div id="graficoRelatorio"></div>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>

    <script type="text/javascript">
        $(function() {
            $('#graficoRelatorio').highcharts({
                chart: {
                    backgroundColor: 'transparent',
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                lang   : {
                        printChart: "Imprimir",
                        contextButtonTitle: "",
                        decimalPoint: ".",
                        downloadJPEG: "Download JPEG",
                        downloadPDF: "Download PDF",
                        downloadPNG: "Download PNG ",
                        downloadSVG: "Download SVG",
                },
                credits: {
                    enabled: false
                },
                title: {
                    text: '<?php echo $dadosGrafico; ?>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                        
                series: [{
                        type: 'pie',
                        name: 'Nº de Atendimentos',
                        data: [
    <?php while ($linhaResultado = mysqli_fetch_array($queryBusca)): ?>
                                ["<?php echo $linhaResultado['nome_tipo_atendimento']; ?>", <?php echo $linhaResultado['total_atendimento']; ?>],
    <?php endwhile; ?>
                        ]
                    }]
            });
        });
    </script>
<?php endif; ?>

<?php include ('includes/menuBack.php'); ?>
<?php include ('includes/rodape.php'); ?>