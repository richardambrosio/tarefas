<div class="container">
    <table class="table table-striped table-borderless table-hover">
        <thead class="thead-light">
            <tr">
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Opções</th>
            </tr>
        </thead>
    
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td>
                    <a class="btn btn-outline-info" href="tarefa.php?id=<?=$tarefa['id']; ?>">
                        <?php echo $tarefa['nome']; ?>
                    </a>
                </td>
                <td>
                    <?php echo $tarefa['descricao']; ?>    
                </td>
                <td>
                    <?php echo traduz_data_para_exibir($tarefa['prazo']); ?>
                </td>
                <td>
                    <?php echo traduz_prioridade($tarefa['prioridade']); ?>
                </td>
                <td>
                    <?php echo traduz_concluida($tarefa['concluida']); ?>
                </td>
                <td>
                    <a class="btn btn-outline-secondary" href="editar.php?id=<?php echo $tarefa['id'] ?>">
                        Editar
                    </a>
                    &nbsp;
                    <a class="btn btn-outline-danger" href="remover.php?id=<?php echo $tarefa['id'] ?>">
                        Remover
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>