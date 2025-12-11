<?php
    require "../../autoload.php";

    // Excluir do Banco de Dados
    $dao = new ServicoAtendimentoDAO();
    $dao->destroy($_GET['idServico'],$_GET['idAtendimento']);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: create.php?id=' . $_GET['idServico']);
