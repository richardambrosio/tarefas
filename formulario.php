<div class="container">
    <form method="POST">
        <div class="row">
            <div class="col">
                <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">

                <fieldset>
                    <div class="form-group">
                        <legend class="text-info">Nova Tarefa</legend>
                        <label>Tarefa:</label>
                        <?php if ($tem_erros && array_key_exists('nome', $erros_validacao)) : ?>
                            <div class="alert alert-danger">
                                <span class="erro"><?=$erros_validacao['nome']; ?></span>
                            </div>
                        <?php endif; ?>
                        <input type="text" class="form-control" name="nome" placeholder="Nome da tarefa..." value="<?php echo $tarefa['nome']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Descrição(Opcional):</label>
                        <textarea class="form-control" name="descricao" placeholder="Especifique a tarefa">
                            <?php echo $tarefa['descricao']; ?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Prazo(Opcional):</label>
                        <?php if ($tem_erros && array_key_exists('prazo', $_POST)) : ?>
                            <div class="alert alert-danger">
                                <span class="erro"><?=$erros_validacao['prazo']; ?></span>
                            </div>
                        <?php endif; ?>
                        <input type="text" class="form-control" name="prazo" placeholder="dd/mm/aaaa" value="<?php echo traduz_data_para_exibir($tarefa['prazo']) ?>" />
                    </div>

                    <div class="form-group">
                        <legend>Prioridade:</legend>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="prioridade" value="1"
                                <?php echo ($tarefa['prioridade'] == 1)
                                    ? 'checked'
                                    : '';
                                ?>
                            />
                            <label class="form-check-label">Baixa</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="prioridade" value="2"
                                <?php echo ($tarefa['prioridade'] == 2)
                                    ? 'checked'
                                    : '';
                                ?>
                            />
                            <label class="form-check-label">Média</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="prioridade" value="3"
                                <?php echo ($tarefa['prioridade'] == 3)
                                    ? 'checked'
                                    : '';
                                ?>
                            />
                            <label class="form-check-label">Alta</label>
                        </div>
                    </div>

                    <div class="form-check form-group">
                        <input type="checkbox" class="form-check-input" name="concluida" value="1"
                        <?php echo ($tarefa['concluida'] == 1)
                                    ? 'checked'
                                    : '';
                                    ?>
                            />
                        <label class="form-check-label">Tarefa Concluída</label>
                    </div>

                    <div class="form-check form-group">
                        <input type="checkbox" class="form-check-input" name="lembrete" value="1" />
                        <label class="form-check-label">Lembrete por e-mail</label>
                    </div>

                    <input type="submit" class="btn btn-success" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" />
                </fieldset>
            </div>
        </div>
    </form>
</div>
<hr>
<br>