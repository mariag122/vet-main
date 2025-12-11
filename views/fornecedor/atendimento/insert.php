<?php
    require "../../autoload.php";

    // Construir o objeto do atendimento
    $atendimento = new Atendimento();
    $atendimento->setData_atendimento($_POST['data_atendimento']);
    
    // Construir um objeto do Animal
    $animal = new Animal();
    $animal->setId($_POST['animal']);
    
    // Construir um objeto do Servico
    $servico = new Servico();
    $servico->setId($_POST['servico']);

    // Definir o Animal e o Serviço (objetos das associações) na classe Atendimento
    $atendimento->setAnimal($animal);
    $atendimento->setServico($servico);

    // Inserir no Banco de Dados
    $dao = new AtendimentoDAO();
    $dao->create($atendimento);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');
