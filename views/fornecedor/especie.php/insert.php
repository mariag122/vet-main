
<?php
    require "../../autoload.php";

    // Construir o objeto da Especie
    $especie = new Especie();
    $especie->setDescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new EspecieDAO();
    $dao->create($especie);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
