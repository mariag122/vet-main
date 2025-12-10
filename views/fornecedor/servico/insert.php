<?php
    require "../../autoload.php";

    // Construir o objeto do servico
    $servico = new Servico();
    $servico->setNome($_POST['nome']);
    $servico->setDescricao($_POST['descricao']);
    $servico->setValor($_POST['valor']);

    // Inserir no Banco de Dados
    $dao = new ServicoDAO();
    $dao->create($servico);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
