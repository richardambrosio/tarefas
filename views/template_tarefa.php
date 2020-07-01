<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="libs/bootstrap-4.4.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/tarefas.css" type="text/css" />
    </head>
    <body>
        <div class="jumbotron">
            <div class="container-fluid">
                <h1 class="display-4">Tarefa: <?=htmlentities($tarefa->getNome()); ?></h1>
            </div>
        </div>

        <div class="container">
            <a class="btn btn-info" href="index.php?rota=tarefas">Voltar para a lista de tarefas</a>

            <hr>

            <h4>Concluída:</h4>
            <p class="lead">
                <?=traduz_concluida($tarefa->getConcluida()); ?>
            </p>
            
            <h4>Descrição:</h4>
            <p class="lead">
                <?=nl2br(htmlentities($tarefa->getDescricao())); ?>
            </p>
            
            <h4>Prazo:</h4>
            <p class="lead">
                <?=traduz_data_para_exibir($tarefa->getPrazo()); ?>
            </p>
            
            <h4>Prioridade:</h4>
            <p class="lead">
                <?=traduz_prioridade($tarefa->getPrioridade()); ?>
            </p>

            <hr>

            <h4>Anexos</h4>
            <!-- lista de anexos -->
            <?php if (count($tarefa->getAnexos()) > 0) : ?>
                <table class="table table-striped table-borderless table-hover">
                    <thead class="thead-light">
                        <tr class=>
                            <th>Arquivo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php foreach ($tarefa->getAnexos() as $anexo) : ?>
                        <tr>
                            <td><?=htmlentities($anexo->getNome()); ?></td>
                            <td>
                                <a class="btn btn-outline-warning" href="anexos/<?=$anexo->getArquivo(); ?>">Download</a>
                                <a class="btn btn-outline-danger" href="index.php?rota=remover_anexo&id=<?=$anexo->getId(); ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <p class="lead">Não há anexos para esta tarefa.</p>
            <?php endif; ?>

            <hr>

            <!-- formulário para um novo anexo -->
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="tarefa_id" value="<?=$tarefa->getId(); ?>" />

                    <div class="form-group">
                        <legend class="text-info">Novo anexo</legend>
                    </div>
                    
                    <?php if ($tem_erros && isset($erros_validacao['anexo'])) : ?>
                        <div class="alert alert-danger">
                            <span class="erro"><?=$erros_validacao['anexo']; ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <input class="form-control-file" type="file" name="anexo" />
                    </div>
                    
                    <input type="submit" class="btn btn-success" value="Cadastrar" />
                </fieldset>
            </form>
        </div><!--container-->

        <script src="libs/bootstrap-4.4.1-dist/css/jquery-3.5.1.min.js"></script>
        <script src="libs/bootstrap-4.4.1-dist/css/bootstrap.bundle.min.js"></script>
    </body>
</html>
