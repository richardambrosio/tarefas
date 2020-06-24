<html>
    <head>
        <meta charset="utf-8" />
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="bibliotecas/bootstrap-4.4.1-dist/css/bootstrap.min.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="tarefas.css" type="text/css">
    </head>
    <body>
        <div class="jumbotron">
            <div class="container-fluid">
                <h1 class="display-4">Gerenciador de Tarefas</h1>
            </div>
        </div>
            
        <?php require 'formulario.php' ?>

        <?php if ($exibir_tabela) : ?>
            <?php require 'tabela.php'; ?>
        <?php endif; ?>


        <footer class="text-light text-center bg-secondary">
            <p class="lead">
                Desenvolvido por: <strong>Richard Ambrosio<strong>
            </p>

            <div class="row">
                <div class="col">
                    <a href="https://www.instagram.com/richa.ambrosio/" class="text-light">
                        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="https://github.com/richardambrosio" class="text-light">
                        <i class="fa fa-github fa-2x" aria-hidden="true"></i>
                    </a>
                    &nbsp;&nbsp;
                    <a href="https://www.facebook.com/richard.ambrosio97/" class="text-light">
                        <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            <script src="bibliotecas/bootstrap-4.4.1-dist/css/jquery-3.5.1.min.js"></script>
            <script src="bibliotecas/bootstrap-4.4.1-dist/css/bootstrap.bundle.min.js"></script>
        </footer>
    </body>
</html>