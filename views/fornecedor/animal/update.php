<?php
    require "../../autoload.php";

    // 
    $animal = new animal();
    $animal->setNome($_POST['nome']);
    $animal->setPeso($_POST['peso']);
    $animal->setDataNascimento($_POST['data_nascimento']);
    $animal->setId($_POST['id']);

    // Construir um objeto do TipoProduto
    $Cliente = new Cliente();
    $Cliente->setId($_POST['cliente']);

    // Definir o tipoProduto (objeto da associação) na classe Produto
    $animal->setCliente($Cliente);

    // Inserir no Banco de Dados
    $dao = new AnimalDAO();
    $dao->update($animal);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
