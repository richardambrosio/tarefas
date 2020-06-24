<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="bibliotecas/bootstrap-4.4.1-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="tarefas.css" type="text/css" />
    </head>
    <body>
        <div class="jumbotron">
            <div class="container-fluid">
                <h1 class="display-4">Tarefa: <?=$tarefa['nome']; ?></h1>
            </div>
        </div>
        <div class="container" id="bloco_pricipal">
            
            <a href="tarefas.php" class="btn btn-info">Voltar para a Lista de Tarefas</a>
            <br>
            <br>

            <h4>Concluída:</h4>
            <p class="lead">
                <?=traduz_concluida($tarefa['concluida']); ?>
            </p>
            
            <h4>Prazo:</h4>
            <p class="lead">
                <?=traduz_data_para_exibir($tarefa['prazo']); ?>
            </p>
            <hr>

            <h4>Anexos</h4>
            <!--Lista de Anexos-->
            <?php if (count($anexos) > 0) : ?>
                <table class="table table-striped table-borderless table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Arquivo</th>
                            <th>Opções</th>
                        </tr>
                    </thead>

                    <?php foreach ($anexos as $anexo) : ?>
                        <tr>
                            <td><?=$anexo['nome']; ?></td>
                            <td>
                                <a class="btn btn-outline-warning" href="anexos/<?=$anexo['arquivo']; ?>">Download</a>
                                <a class="btn btn-outline-danger" href="remover_anexo.php?id=<?=$anexo['id']; ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            <?php else : ?>
                <p class="lead">Não há anexos para essa tarefa...</p>
            <?php endif; ?>

            <!--Formulário para um novo Anexo-->
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="tarefa_id" value="<?=$tarefa['id']; ?>" />

                    <div class="form-group">
                        <legend class="text-info">Novo Anexo</legend>
                    </div>
                    
                    <?php if ($tem_erros && array_key_exists('anexo', $erros_validacao)) : ?>
                        <div class="alert alert-danger">
                            <span class="erro"><?=$erros_validacao['anexo']; ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <input type="file" class="form-control-file" name="anexo" />
                    </div>
                    
                    <input type="submit" class="btn btn-success" value="Cadastrar" />
                </fieldset>
            </form>
        </div>

        <script src="bibliotecas/bootstrap-4.4.1-dist/css/jquery-3.5.1.min.js"></script>
        <script src="bibliotecas/bootstrap-4.4.1-dist/css/bootstrap.bundle.min.js"></script>
    </body>
</html>