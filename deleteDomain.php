<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

$id = $_GET['id'];

$domainInfo = new Domain();
$domainInfo->id = $id;
$domainData = $domainInfo->getDomainsById();


if(isset($_POST['excluir'])){

    $domainInfo->deleteDomainById();
    header('location: systemParams.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__. '/includes/deleteDomain.php';
include __DIR__ . '/includes/footer.php';
