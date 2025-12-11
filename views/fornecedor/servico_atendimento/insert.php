<?php
    require "../../autoload.php";

    // Construir o objeto da CompraProduto
    $servicoAtendimento = new ServicoAtendimento();
    
    // Construir um objeto da Compra
    $servico = new Servico();
    $servico->setId($_POST['id']);
    
    // Construir um objeto do Produto
    $atendimento = new Atendimento();
    $atendimento->setId($_POST['atendimento']);

    // Definir o compra e Produto (objetos das associações) na classe CompraProduto
    $servicoAtendimento->setAtendimento($atendimento);
    $servicoAtendimento->setAtendimento($atendimento);

    // Inserir no Banco de Dados
    $dao = new servicoAtendimentoDAO();
    $dao->create($servicoAtendimento);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: create.php?id=' . $servico->getId());
