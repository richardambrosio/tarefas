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
        $nome = strip_tags($this->conexao->escape_string($tarefa->getNome()));
        $descricao = strip_tags($this->conexao->escape_string($tarefa->getDescricao()));
        $prioridade = $tarefa->getPrioridade();
        $prazo = $tarefa->getPrazo();
        $concluida = ($tarefa->getConcluida()) ? 1 : 0;

        if (is_object($prazo)) {
            $prazo = $prazo->format('Y-m-d');
        }

        $sqlGravar = "
            INSERT INTO tarefas (
                nome, descricao, prioridade, prazo, concluida
            ) VALUES (
                '{$nome}',
                '{$descricao}',
                {$prioridade},
                '{$prazo}',
                {$concluida}
            )
        ";

        $this->conexao->query($sqlGravar);
    }

    public function atualizar(Tarefa $tarefa)
    {
        $id = $tarefa->getId();
        $nome = strip_tags($this->conexao->escape_string($tarefa->getNome()));
        $descricao = strip_tags($this->conexao->escape_string($tarefa->getDescricao()));
        $prioridade = $tarefa->getPrioridade();
        $prazo = $tarefa->getPrazo();
        $concluida = ($tarefa->getConcluida()) ? 1 : 0;

        if (is_object($prazo)) {
            $prazo = $prazo->format('Y-m-d');
        }

        $sqlEditar = "
            UPDATE tarefas SET
                nome = '{$nome}',
                descricao = '{$descricao}',
                prioridade = {$prioridade},
                prazo = '{$prazo}',
                concluida = {$concluida}
            WHERE id = {$id}
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
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = $this->conexao->query($sqlBusca);

        $tarefas = [];

        while ($tarefa = $resultado->fetch_object('Tarefa')) {
            $tarefa->setAnexos($this->buscar_anexos($tarefa->getId()));
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }

    private function buscar_tarefa($id)
    {
        $id = $this->conexao->escape_string($id);

        $sqlBusca = "SELECT * FROM tarefas WHERE id = {$id}";
        $resultado = $this->conexao->query($sqlBusca);

        $tarefa = $resultado->fetch_object('Tarefa');
        $tarefa->setAnexos($this->buscar_anexos($tarefa->getId()));

        return $tarefa;
    }

    public function salvar_anexo(Anexo $anexo)
    {
        $nome = $this->conexao->escape_string($anexo->getNome());
        $arquivo = strip_tags($this->conexao->escape_string($anexo->getArquivo()));

        $sqlGravar = "
            INSERT INTO anexos (
                tarefa_id, nome, arquivo
            ) VALUES (
                {$anexo->getTarefaId()},
                '{$nome}',
                '{$arquivo}'
            )";

        $this->conexao->query($sqlGravar);
    }

    public function buscar_anexos($tarefa_id)
    {
        $tarefa_id = $this->conexao->escape_string($tarefa_id);

        $sqlBusca = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
        $resultado = $this->conexao->query($sqlBusca);

        $anexos = array();

        while ($anexo = $resultado->fetch_object('Anexo')) {
            $anexos[] = $anexo;
        }

        return $anexos;
    }

    public function buscar_anexo($anexo_id)
    {
        $anexo_id = $this->conexao->escape_string($anexo_id);

        $sqlBusca = "SELECT * FROM anexos WHERE id = {$anexo_id}";
        $resultado = $this->conexao->query($sqlBusca);

        return $resultado->fetch_object('Anexo');
    }

    public function remover($id)
    {
        $id = $this->conexao->escape_string($id);

        $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";

        $this->conexao->query($sqlRemover);
    }

    public function remover_anexo($id)
    {
        $id = $this->conexao->escape_string($id);

        $sqlRemover = "DELETE FROM anexos WHERE id = {$id}";

        $this->conexao->query($sqlRemover);
    }
}
