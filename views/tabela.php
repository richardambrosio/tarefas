<div class="container">
    <table class="table table-striped table-borderless table-hover">
        <thead class="thead-light">
            <tr>
                <th>Tarefa</th>
                <th>Descricao</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Opções</th>
            </tr>
        </thead>

        <?php foreach ($tarefas as $tarefa) : ?>
            <tr>
                <td>
                    <a class="btn btn-outline-info" href="index.php?rota=tarefa&id=<?=$tarefa->getId(); ?>">
                        <?=htmlentities($tarefa->getNome()); ?>
                    </a>
                </td>
                <td>
                    <?=htmlentities($tarefa->getDescricao()); ?>
                </td>
                <td>
                    <?=traduz_data_para_exibir($tarefa->getPrazo()); ?>
                </td>
                <td>
                    <?=traduz_prioridade($tarefa->getPrioridade()); ?>
                </td>
                <td>
                    <?=traduz_concluida($tarefa->getConcluida()); ?>
                </td>
                <td>
                    <a class="btn btn-outline-secondary" href="index.php?rota=editar&id=<?=$tarefa->getId(); ?>">
                        Editar
                    </a>
                    <a class="btn btn-outline-danger" href="index.php?rota=remover&id=<?=$tarefa->getId(); ?>">
                        Remover
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
