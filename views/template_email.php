<h1>Lembrete - Gerenciador de Tarefas</h1>
<h2><?php echo $tarefa->getNome(); ?></h2>

<hr>

<h3>Concluída:</h3>
<p><?php echo traduz_concluida($tarefa->getConcluida()); ?></p>

<hr>

<h3>Descrição:</h3>
<p><?php echo nl2br($tarefa->getDescricao()); ?></p>

<hr>

<h3>Prazo:</h3>
<p><?php echo traduz_data_para_exibir($tarefa->getPrazo()); ?></p>

<hr>

<h3>Prioridade:</h3>
<p><?php echo traduz_prioridade($tarefa->getPrioridade()); ?></p>

<hr>

<?php if (count($tarefa->getAnexos()) > 0) : ?>
    <p><strong>Atenção!</strong> Esta tarefa contém anexos!</p>
<?php endif; ?>

<hr>

<h4>Tenha em excelente dia! ;)</h4>