<?php
    require "../../autoload.php";

    // 
    $animal = new Animal();
    $animal->setNome($_POST['nome']);
    $animal->setPeso($_POST['peso']);
    $animal->setDataNascimemto($_POST['data_nascimento']);

    // Construir um objeto do TipoProduto
    $cliente = new cliente();
    $cliente->setId($_POST['cliente']);

    // Definir o tipoProduto (objeto da associação) na classe Produto
    $animal->setCliente($cliente);

    // Inserir no Banco de Dados
    $dao = new AnimalDAO();
    $dao->create($animal);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
