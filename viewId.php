<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

$id = $_GET['id'];

$protocolInfo = new Ticket();
$protocolInfo->id = $id;
$ticketData = $protocolInfo->getTicketsById();

include __DIR__ . '/includes/header.php';
?>

<main>
    <section>
        <table class="table bg-light mt-3 table-center">
            <tbody>
                <tr>
                    <td>Protocolo: <?= $ticketData['protocol'] ?></td>
                </tr>
                <tr>
                    <td>Título: <?= $ticketData['title'] ?></td>
                </tr>
                <tr>
                    <td>Tipo: <?= $ticketData['type'] ?></td>
                </tr>
                <tr>
                    <td>Descrição: <?= $ticketData['description'] ?></td>
                </tr>
                <tr>
                    <td>ID do Usuário: <?= $ticketData['user_id'] ?></td>
                </tr>
                <tr>
                    <td>ID do Responsável: <?= $ticketData['responsible_id'] ?></td>
                </tr>
                <tr>
                    <td>Data de Abertura: <?= $ticketData['open_at'] ?></td>
                </tr>
                <?php if (!empty($ticketData['closed_at'])) : ?>
                    <tr>
                        <td>Data de Fechamento: <?= $ticketData['closed_at'] ?></td>
                    </tr>
                <?php endif; ?>

                <?php if (!empty($ticketData['closure_reason'])) : ?>
                    <tr>
                        <td>Motivo de Encerramento: <?= $ticketData['closure_reason'] ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td>Criado por: <?= $ticketData['created_by'] ?></td>
                </tr>
                <tr>
                    <td>Data de Criação: <?= $ticketData['created_at'] ?></td>
                </tr>
                <tr>
                    <td>Última Atualização: <?= $ticketData['updated_at'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="button-container">
            <?php
            if ($ticketData['closed_at'] == '') {
                echo '<button id="closeButton" class="encerrar-button" data-protocol="' . $ticketData['protocol'] . '">Encerrar Ticket</button>';
            }
            ?>

            <button id="deletarRegistroButton" class="deletar-button">Deletar Ticket</button>

            <button id="EditButton" class="alterar-button">Alterar Ticket</button>
        </div>
    </section>
</main>

<style>
    main {
        margin: 20px;
        padding: 20px;
        background-color: #f7f7f7;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    h2.mt-3 {
        font-size: 24px;
        margin-top: 10px;
    }

    form {
        margin-top: 20px;
    }

    .form-group {
        margin: 10px 0;
    }

    p {
        font-size: 18px;
    }

    label {
        font-size: 18px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 18px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        margin-right: 10px;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var closeButton = document.getElementById('closeButton');
        var deleteButton = document.getElementById('deletarRegistroButton');
        var editButton = document.getElementById('EditButton');

        if (closeButton) {
            closeButton.addEventListener('click', function() {
                const protocolTicket = '<?= $ticketData['protocol'] ?>';
                window.location.href = 'closeId.php?id=' + protocolTicket;
            });
        }

        if (deleteButton) {
            deleteButton.addEventListener('click', function() {
                const protocolTicket = '<?= $ticketData['protocol'] ?>';
                console.log("chegamos");
                window.location.href = 'deleteId.php?id=' + protocolTicket;
            });
        }

        if (editButton) {
            editButton.addEventListener('click', function() {
                const protocolTicket = '<?= $ticketData['protocol'] ?>';
                window.location.href = 'EditId.php?id=' + protocolTicket;
            });
        }
    });
</script>

<?php
include __DIR__ . '/includes/footer.php';
?>