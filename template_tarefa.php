<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="tarefas.css" type="text/css" />
    </head>
    <body>
        <div id="bloco_principal">
            <h1>Tarefa: <?=$tarefa->getNome(); ?></h1>

            <p><a href="tarefas.php">Voltar para a lista de tarefas</a>.</p>

            <p><strong>Concluída:</strong> <?=traduz_concluida($tarefa->getConcluida()); ?></p>
            <p><strong>Descrição:</strong> <?=nl2br($tarefa->getDescricao()); ?></p>
            <p><strong>Prazo:</strong> <?=traduz_data_para_exibir($tarefa->getPrazo()); ?></p>
            <p><strong>Prioridade:</strong> <?=traduz_prioridade($tarefa->getPrioridade()); ?></p>

            <h2>Anexos</h2>
            <!-- lista de anexos -->
            <?php if (count($tarefa->getAnexos()) > 0) : ?>
                <table>
                    <tr>
                        <th>Arquivo</th>
                        <th>Opções</th>
                    </tr>
                    <?php foreach ($tarefa->getAnexos() as $anexo) : ?>
                        <tr>
                            <td><?=$anexo->getNome(); ?></td>
                            <td>
                                <a href="anexos/<?=$anexo->getArquivo(); ?>">Download</a>
                                <a href="remover_anexo.php?id=<?=$anexo->getId(); ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p>Não há anexos para esta tarefa.</p>
            <?php endif; ?>

            <!-- formulário para um novo anexo -->
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>Novo anexo</legend>
                    <input type="hidden" name="tarefa_id" value="<?=$tarefa->getId(); ?>" />
                    <label>
                        <?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
                            <span class="erro"><?=$erros_validacao['anexo']; ?></span>
                        <?php endif; ?>
                        <input type="file" name="anexo" />
                    </label>
                    <input type="submit" value="Cadastrar" class="botao" />
                </fieldset>
            </form>
        </div>
    </body>
</html>
