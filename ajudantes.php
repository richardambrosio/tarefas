<?php

function traduz_prioridade($codigo)
{
    $prioridade = '';

    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Média';
            break;
        case 3:
            $prioridade = 'Alta';
            break;
    }

    return $prioridade;
}

function traduz_data_para_banco($data)
{
    if ($data == '') return '';

    $partes = explode("/", $data);
    if (count($partes) != 3) return $data;

    // $dados = explode('/', $data);
    // $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    // return $data_banco;

    $objetoData = DateTime::createFromFormat('d/m/Y', $data);
    return $objetoData->format('Y-m-d');
}

function traduz_data_para_exibir($data)
{
    if ($data == '' || $data == '0000-00-00') return '';

    $partes = explode("-", $data);
    if (count($partes) != 3) return $data;

    // $dados = explode('-', $data);
    // $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    // return $data_exibir;

    $objetoData = DateTime::createFromFormat('Y-m-d', $data);
    return $objetoData->format('d/m/Y');

}

function traduz_concluida($concluida)
{
    if ($concluida == 1) return 'Sim';
    return 'Não';
}

function tem_post() 
{
    if (count($_POST) > 0) return true;
    return false;
}

function validar_data($data)
{
    $regex = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($regex, $data);

    if ($resultado == 0) return false;

    $dados = explode('/', $data);
    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

function tratar_anexo($anexo)
{
    $padrao = '/^.+(\.pdf|\.zip)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) return false;

    move_uploaded_file($anexo['tmp_name'], "anexos/{$anexo['name']}");

    return true;
    
}

function enviar_email($tarefa, $anexos = [])
{
    require "bibliotecas/vendor/autoload.php";
    

    $corpo = preparar_corpo_email($tarefa, $anexos);

    $email = new PHPMailer();

    $email->isSMTP();
    $email->Host = 'smtp.google.com';
    $email->Port = 587;
    $email->SMTPSecure = 'tls';
    $email->SMTPAuth = true;
    $email->Username = EMAIL_REMETENTE;
    $email->Password = SENHA_REMETENTE;
    $email->setFrom(EMAIL_REMETENTE, 'Avisador de Tarefas');
    $email->addAddress(EMAIL_NOTIFICACAO);
    $email->Subject = "Aviso de Tarefa: {$tarefa['nome']}";
    $email->msgHTML($corpo);

    foreach ($anexos as $anexo) {
        $email->addAttachment("anexos/{$anexo['arquivo']}");
    }

    $email->send();
}

function preparar_corpo_email($tarefa, $anexos)
{
    //Objetivo: pegar o conteúdo processado do arquivo template_email.php

    # Avisar o PHP que não é para enviar o resultado do processamento
    # para o navegador (ativa o buffer de saída)
    ob_start();

    include 'template_email.php';

    $corpo = ob_get_contents();

    # Avisar o PHP que pode voltar a enviar conteúdos para o navegador
    # Descarta o conteúdo do buffer
    ob_end_clean();

    return $corpo;
}