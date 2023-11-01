<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

$id = $_GET['id'];

$domainInfo = new Domain();
$domainInfo->id = $id;
$domainData = $domainInfo->getDomainsById();
//echo "<pre>"; print_r($domainData); echo "</pre>"; exit;

include __DIR__ . '/includes/header.php';
?>

<main>
    <section>
        <table class="table bg-light mt-3 table-center">
            <tbody>
                <tr>
                    <td>Nome: <?= $domainData['name'] ?></td>
                </tr>
                <tr>
                    <td>Domínio: <?= $domainData['domain'] ?></td>
                </tr>
                <tr>
                    <td>Status: <?= $domainData['status'] ?></td>
                </tr>
                <tr>
                    <td>Criado pelo ID: <?= $domainData['created_by'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="button-container">
            <?php
            if ($domainData['status'] == 'Ativo') {
                echo '<button id="statusButton" class="status-button" data-protocol="' . $domainData['id'] . '">Inativar</button>';
            }else{
                echo '<button id="statusButton" class="status-button" data-protocol="' . $domainData['id'] . '">Ativar</button>';
            }
            ?>

            <button id="deleteButton" class="deletar-button">Deletar Domínio</button>

            <button id="editButton" class="alterar-button">Alterar Domínio</button>
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
        var statusButton = document.getElementById('statusButton');
        var deleteButton = document.getElementById('deleteButton');
        var editButton = document.getElementById('editButton');
        const idDomain = '<?= $domainData['id'] ?>';

        if (statusButton) {
            statusButton.addEventListener('click', function() {
                window.location.href = 'tradeStatus.php?id=' + idDomain+'&status=' +'<?= $domainData['status'] ?>';
            });
        }

        if (deleteButton) {
            deleteButton.addEventListener('click', function() {
                window.location.href = 'deleteDomain.php?id=' + idDomain;
            });
        }

        if (editButton) {
            editButton.addEventListener('click', function() {
                window.location.href = 'editDomain.php?id=' + idDomain;
            });
        }
    });
</script>

<?php
include __DIR__ . '/includes/footer.php';
?>