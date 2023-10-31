<?php
$resultados = '';

foreach ($_SESSION['AllTicketsAdmin'] as $ticket) {
    $resultados .= '<tr>
                      <td><a href="viewId.php?id=' . $ticket['protocol'] . '">' . $ticket['protocol'] . '</a></td>
                      <td>' . $ticket['title'] . '</td>
                      <td>' . $ticket['type'] . '</td>
                      <td>' . $ticket['description'] . '</td>
                    </tr>';
}

$resultados = !empty($resultados) ? $resultados : '<tr>
                                                     <td colspan="4" class="text-center">
                                                         Nenhum ticket encontrado
                                                     </td>
                                                 </tr>';
?>

<main>
    <?= $mensagem ?>
    <section>
        <table class="table bg-light mt-3 table-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
        <button id="createButton" type="button" class="btn btn-success mx-auto">Criar Ticket</button>
    </section>
</main>

<script>
    document.getElementById('createButton').addEventListener('click', function() {

        // Redirecione o usuário para a página viewId.php com o ID do ticket como parâmetro na URL
        window.location.href = 'createTicket.php';

    });
</script>