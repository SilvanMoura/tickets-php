<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

session_start();

$id = $_GET['id'];

if ($_GET['status'] == "Ativo") {
    $status = "Inativo";
} else {
    $status = "Ativo";
}

$tradeStatus = new Domain();
$tradeStatus->id = $id;
$tradeStatus->status = $status;
$tradeDate = $tradeStatus->tradeStatusDomain();

header('Location: domainId.php?id=' . $id);
exit;
