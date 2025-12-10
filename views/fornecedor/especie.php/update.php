<?php
    require "../../autoload.php";

    // Construir o objeto da Especie
    $especie = new Especie();
    $especie->setDescricao($_POST['descricao']);
    $especie->setId($_POST['id']);

    // Atualizar registro no Banco de Dados
    $dao = new EspecieDAO();
    $dao->update($especie);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
