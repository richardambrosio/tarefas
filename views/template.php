<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="libs/bootstrap-4.4.1-dist/css/bootstrap.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/tarefas.css" type="text/css" />
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <h1 class="display-4">Gerenciador de Tarefas</h1>
            </div>
        </div>

        <?php include('formulario.php'); ?>

        <?php if ($exibir_tabela) : ?>
            <?php include('tabela.php'); ?>
        <?php endif; ?>

        <?php include('footer.php'); ?>
    </body>
</html>
