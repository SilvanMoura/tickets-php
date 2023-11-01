<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

session_start();

$domainCreate = new Domain();

if (isset($_POST['nome'], $_POST['dominio'])) {

    $domainCreate->name = $_POST['nome'];
    $domainCreate->domain = $_POST['dominio'];
    $domainCreate->status = 'Ativo';
    $domainCreate->creatorId = $_SESSION['id_usuario'];
    $domainCreate->createDomain();
    
    header('location: systemParams.php');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/createDomain.php';
include __DIR__ . '/includes/footer.php';