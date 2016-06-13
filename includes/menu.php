<div id='cssmenu' style="height: 575px; background-color: #3ab4a6;">
	<ul>
		<li><a href='home.php'>Home</a></li>

<?php if (verificarPermissao('AGENDA_LISTAR') || verificarPermissao('AGENDA_INSERIR')): ?>
		<li class='active'><a href='#'>Agenda</a>
			<ul>
                <?php if (verificarPermissao('AGENDA_LISTAR')): ?>
                    <li><a href='consultarAgenda.php'>Agenda</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('AGENDA_INSERIR')): ?>
                    <li><a href='formAgenda.php'>Novo Agendamento</a>
                    <?php endif; ?>
			</ul></li>
<?php endif; ?>

<?php if (verificarPermissao('ATENDIMENTO_LISTAR') || verificarPermissao('ATENDIMENTO_INSERIR')): ?>
		<li class='active'><a href='#'>Atendimentos</a>
			<ul>
                <?php if (verificarPermissao('ATENDIMENTO_LISTAR')): ?>
                    <li><a href='consultarAtendimento.php'>Buscar
						Atedimento</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('ATENDIMENTO_INSERIR')): ?>
                    <li><a href='formAtendimento.php'>Novo Atendimento</a>
                    <?php endif; ?>
			</ul></li>
<?php endif; ?>

<?php if (verificarPermissao('TIPO_ATENDIMENTO_LISTAR') || verificarPermissao('TIPO_ATENDIMENTO_INSERIR')): ?>
		<li class='active'><a href='#'>Tipos de Atendimentos</a>
			<ul>
				<?php if (verificarPermissao('TIPO_ATENDIMENTO_LISTAR')): ?>
                  	<li><a href='consultarTipoAtendimento.php'>Tipos de
						Atendimento</a>
                 <?php endif; ?>
                 
                 <?php if (verificarPermissao('TIPO_ATENDIMENTO_INSERIR')): ?>
				<li><a href='formTipoAtendimento.php'>Novo Tipo de Atendimento</a>
                 <?php endif; ?>
			</ul></li>
<?php endif; ?>

<?php if (verificarPermissao('PACIENTE_LISTAR') || verificarPermissao('PACIENTE_INSERIR')): ?>
		<li class='active'><a href='#'>Pacientes</a>
			<ul>
                <?php if (verificarPermissao('PACIENTE_LISTAR')): ?>
                    <li><a href='consultarPaciente.php'>Buscar Paciente</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('PACIENTE_INSERIR')): ?>
                    <li><a href='formPaciente.php'>Novo Paciente</a>
                    <?php endif; ?>
			</ul></li>
<?php endif; ?>

<?php if (verificarPermissao('FUNCIONARIO_LISTAR') || verificarPermissao('FUNCIONARIO_INSERIR')): ?>
		<li class='active'><a href='#'>Funcionários</a>
			<ul>
                <?php if (verificarPermissao('FUNCIONARIO_LISTAR')): ?>
                    <li><a href='consultarFuncionario.php'>Buscar
						Funcionário</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('FUNCIONARIO_INSERIR')): ?>
                    <li><a href='formFuncionario.php'>Novo Funcionário</a></li>
                <?php endif; ?>
            </ul></li>
<?php endif; ?>

<?php if (verificarPermissao('UBS_LISTAR') || verificarPermissao('UBS_INSERIR')): ?>
		<li class='active'><a href='#'>Unidades</a>
			<ul>
                <?php if (verificarPermissao('UBS_LISTAR')): ?>
                    <li><a href='consultarUBS.php'>Buscar Unidades</a></li>
                <?php endif; ?>

                <?php if (verificarPermissao('UBS_INSERIR')): ?>
                    <li><a href='formUBS.php'>Cadastrar Unidades</a></li>
                <?php endif; ?>
            </ul></li>
<?php endif; ?>

<?php if (verificarPermissao('RELATORIOS_ADMINISTRATIVOS') || verificarPermissao('RELATORIOS_MEDICOS')): ?>
		<li class='active'><a href='#'>Relatórios</a>
			<ul>
			    <?php if (verificarPermissao('RELATORIOS_ADMINISTRATIVOS')): ?>
                    <li><a href='relatoriosAdministrativos.php'>Relatórios Administrativos</a></li>
                <?php endif; ?>
            </ul></li>
<?php endif; ?>  
	</ul>
</div>
