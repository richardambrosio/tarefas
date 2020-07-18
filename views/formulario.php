<div class="container">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $tarefa->getId(); ?>" />
        <div class="row">
            <div class="col">
                <legend>Nova tarefa</legend>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <legend>Tarefa</legend>

                            <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                                <div class="alert alert-danger">
                                    <span class="erro"><?php echo $erros_validacao['nome']; ?></span>
                                </div>
                            <?php endif; ?>

                            <input type="text" class="form-control" name="nome" placeholder="Nome da Tarefa..." value="<?php echo htmlentities($tarefa->getNome()); ?>" />
                        </div>

                        <div class="form-group">
                            <legend>Descrição (Opcional)</legend>

                            <textarea class="form-control" name="descricao"><?php echo $tarefa->getDescricao(); ?></textarea>
                        </div>

                        <div class="form-group">
                            <legend>Prazo (Opcional)</legend>
                            
                            <?php if ($tem_erros && isset($erros_validacao['prazo'])) : ?>
                                <div class="alert alert-danger">
                                    <span class="erro"><?php echo $erros_validacao['prazo']; ?></span>
                                </div>
                            <?php endif; ?>

                            <input type="text" class="form-control" name="prazo" placeholder="dd/mm/yyyy" value="<?php echo traduz_data_para_exibir($tarefa->getPrazo()); ?>" />
                        </div>
                    </div><!--col-md-12 col-12-->

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <legend>Prioridade:</legend>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="prioridade" value="1" <?php echo ($tarefa->getPrioridade() == 1) ? 'checked' : ''; ?> />
                                <label class="form-check-label">Baixa</label>
                            </div>
                            
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="prioridade" value="2" <?php echo ($tarefa->getPrioridade() == 2) ? 'checked' : ''; ?> />
                                <label class="form-check-label">Baixa</label>
                            </div>
                            
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="prioridade" value="3" <?php echo ($tarefa->getPrioridade() == 3) ? 'checked' : ''; ?> />
                                <label class="form-check-label">Baixa</label>
                            </div>
                        </div>

                        <div class="form-check form-group">
                            <input type="checkbox" class="form-check-input" name="concluida" value="1" <?php echo ($tarefa->getConcluida()) ? 'checked' : ''; ?> />
                            <label class="form-check-label">Tarefa Concluída</label>
                        </div>

                        <div class="form-check form-group">
                            <input type="checkbox" class="form-check-input" name="lembrete" value="1" />
                            <label class="form-check-label">Lembrete por email</label>
                        </div>
                        
                        <input type="submit" class="btn btn-success" value="<?php echo ($tarefa->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="botao" />
                    </div>
                </div><!--row-->
            </div><!--col-->
        </div><!--row-->
    </form>
</div>
