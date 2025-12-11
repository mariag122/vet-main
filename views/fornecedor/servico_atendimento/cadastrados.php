<?php
    require "../../autoload.php";

    $dao = new ServicoAtendimentoDAO();
?>

<h2>Tabela de Cadastrados</h2>
<table class="table table-hover">
    <tr>
        <th>ID do Servico</th>
        <th>Atendimento</th>
        <th>Ações</th>
    </tr>
    <?php foreach($dao->read($idServico) as $servicoAtendimento) : ?>
        <tr>
            <td><?= $servicoAtendimento->getServico()->getId() ?></td>
            <td><?= $compraAtendimento->getAtendimento() ?></td>
            <td>
                <a class="link link-danger" href="destroy.php?idServico=<?= $idServico ?>&idAtendimento=<?= $ServicoAtendimento->getAtendimento()->getId() ?>" title="Excluir">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
    <?php endforeach ?>

</table>
