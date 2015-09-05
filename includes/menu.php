<div id='cssmenu' style="height: 575px; background-color: #3ab4a6; ">
    <ul>
        <li><a href='home.php'>Home</a></li>

        <li class='active'><a href='#'>Atendimentos</a>
            <ul>
                <?php if (verificarPermissao('ATENDIMENTO_LISTAR')): ?>
                    <li><a href='consultarAtendimento.php'>Buscar Atedimento</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('ATENDIMENTO_INSERIR')): ?>
                    <li><a href='formAtendimento.php'>Novo Atendimento</a>
                    <?php endif; ?>

                    <?php if (verificarPermissao('TIPO_ATENDIMENTO_LISTAR')): ?>
                    <li><a href='consultarTipoAtendimento.php'>Tipos de Atendimento</a>
                    <?php endif; ?>

                    <?php if (verificarPermissao('TIPO_ATENDIMENTO_INSERIR')): ?>
                    <li><a href='formTipoAtendimento.php'>Novo Tipo de Atendimento</a>
                    <?php endif; ?>

            </ul></li>

        <li class='active'><a href='#'>Pacientes</a>
            <ul>
                <?php if (verificarPermissao('PACIENTE_LISTAR')): ?>
                    <li><a href='consultarPaciente.php'>Buscar Paciente</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('PACIENTE_INSERIR')): ?>
                    <li><a href='formPaciente.php'>Novo Paciente</a>
                    <?php endif; ?>
            </ul></li>

        <li class='active'><a href='#'>Funcionários</a>
            <ul>
                <?php if (verificarPermissao('FUNCIONARIO_LISTAR')): ?>
                    <li><a href='consultarFuncionario.php'>Buscar Funcionário</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('FUNCIONARIO_INSERIR')): ?>
                    <li><a href='formFuncionario.php'>Novo Funcionário</a></li>
                <?php endif; ?>
            </ul></li>
        <li class='active'><a href='#'>Relatórios</a>
            <ul>
                <?php if (verificarPermissao('RELATORIO')): ?>
                    <li><a href='relatorios.php'>Relatórios Administrativos</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('RELATORIO')): ?>
                    <li><a href='#'>Relatórios Médicos</a></li>
                <?php endif; ?>
            </ul></li>
        <li><a href='#'>Sobre</a></li>
        <li><a href="mailto:fhnelsis@outlook.com" target="_top">Contato</a></li>
    </ul>
</div>
