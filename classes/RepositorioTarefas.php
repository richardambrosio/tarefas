<?php

class RepositorioTarefas
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function salvar(Tarefa $tarefa)
    {
        $nome = $tarefa->getNome();
        $descricao = $tarefa->getDescricao();
        $prioridade = $tarefa->getPrioridade();
        $prazo = $tarefa->getPrazo();
        $concluida = ($tarefa->getConcluida()) ? 1 : 0;

        if (is_object($prazo)) {
            $prazo = $prazo->format('Y-m-d');
        }

        $sqlGravar =
            "INSERT INTO tarefas
                (nome, descricao, prioridade, prazo, concluida)
            VALUES
                ('{$nome}', '{$descricao}', '{$prioridade}', '{$prazo}', {$concluida});
        ";

        $this->conexao->query($sqlGravar);
    }

    public function atualizar(Tarefa $tarefa)
    {
        $id = $tarefa->getId();
        $nome = $tarefa->getNome();
        $descricao = $tarefa->getDescricao();
        $prioridade = $tarefa->getPrioridade();
        $prazo = $tarefa->getPrazo();
        $concluida = ($tarefa->getConcluida()) ? 1 : 0;

        if (is_object($prazo)) {
            $prazo = $prazo->format('Y-m-d');
        }

        $sqlEditar =
            "UPDATE tarefas SET
                nome = '{$nome}',
                descricao = '{$descricao}',
                prioridade = '{$prioridade}',
                prazo = '{$prazo}',
                concluida = {$concluida}
            WHERE id = {$id};
        ";

        $this->conexao->query($sqlEditar);
    }

    public function buscar($tarefa_id = 0)
    {
        if ($tarefa_id > 0) {
            return $this->buscar_tarefa($tarefa_id);
        } else {
            return $this->buscar_tarefas();
        }
    }

    private function buscar_tarefas()
    {
        $sqlBusca = 'SELECT * FROM tarefas;';
        $resultado = $this->conexao->query($sqlBusca);

        $tarefas = [];

        while ($tarefa = $resultado->fetch_object('Tarefa')) {
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }

    private function buscar_tarefa($tarefa_id)
    {
        $sqlBusca = "SELECT * FROM tarefas WHERE id = {$tarefa_id};";
        $resultado = $this->conexao->query($sqlBusca);

        $tarefa = $resultado->fetch_object('Tarefa');

        return $tarefa;
    }

    public function remover($tarefa_id)
    {
        $sqlRemover = "DELETE FROM tarefas WHERE id = {$tarefa_id};";

        $this->conexao->query($sqlRemover);
    }
}
