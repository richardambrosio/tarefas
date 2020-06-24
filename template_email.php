<h1>Lembrete - Gerenciador de Tarefas</h1>
<h2>Tarefa: <?=$tarefa['nome']; ?></h2>

<h3>Concluída</h3>
<p><?=traduz_concluida($tarefa['concluida']); ?></p>

<hr>

<h3>Descrição</h3>
<p><?=nl2br($tarefa['descricao']); ?></p>

<hr>

<h3>Prazo</h3>
<p><?=traduz_data_para_exibir($tarefa['prazo']); ?></p>

<hr>

<h3>Prioridade</h3>
<p><?=traduz_prioridade($tarefa['prioridade']); ?></p>

<hr>

<?php if (count($anexos) > 0) : ?>
    <p><strong>Atenção!</strong> Esta tarefa contém anexos...</p>
<?php endif; ?>

<p>Tenha um bom dia! ;)</p>