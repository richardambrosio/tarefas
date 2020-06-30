<?php

//Incluir as configurações ajudantes e classes

require "../config.php";
require "helpers/banco.php";
require "helpers/ajudantes.php";
require "models/Tarefa.php";
require "models/Anexo.php";
require "models/RepositorioTarefas.php";

//Criar um objeto da Classe RepositorioTarefas

$repositorio_tarefas = new RepositorioTarefas($pdo);

//Verificar qual arquivo (rota) deve ser usado para tratar a requisição

$rota = "tarefas"; //Rota padrão

if (array_key_exists("rota", $_GET)) $rota = (string) $_GET["rota"];

//Incluir o arquivo que vai tratar a requisição

if (is_file("controllers/{$rota}.php")) require "controllers/{$rota}.php";
else require "controllers/404.php";