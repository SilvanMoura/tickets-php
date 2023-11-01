<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

$domainsInfo = new Domain();
$domainsData = $domainsInfo->getAllDomains();

$resultados = '';

foreach ($domainsData as $domain) {
    $resultados .= '<tr>
                      <td><a href="domainId.php?id=' . $domain['id'] . '">' . $domain['id'] . '</a></td>
                      <td>' . $domain['name'] . '</td>
                      <td>' . $domain['domain'] . '</td>
                      <td>' . $domain['status'] . '</td>
                    </tr>';
}

include __DIR__ . '/includes/header.php';
?>

<main>
    <?= $mensagem ?>
    <section>
        <table class="table bg-light mt-3 table-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Dominio</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
        <button id="createButton" type="button" class="btn btn-success mx-auto">Criar Domínio</button>
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

<?php
include __DIR__ . '/includes/footer.php';
?>

<script>
    document.getElementById('createButton').addEventListener('click', function() {
        window.location.href = 'createDomain.php';

    });
</script>