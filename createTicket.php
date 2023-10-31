<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

session_start();

$protocolInfo = new Ticket();

if (isset($_POST['titulo'], $_POST['tipo'])) {
    
    $protocolInfo->title = $_POST['titulo'];
    $protocolInfo->type = $_POST['tipo'];
    $protocolInfo->descricao = $_POST['descricao'];
    $protocolInfo->responseId = $_POST['responsavel_id'];
    $protocolInfo->creatorId = $_SESSION['id_usuario'];
    $protocolInfo->createTicket();
    
    header('location: index.php?status=success');
    exit;

}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/createForm.php';
include __DIR__ . '/includes/footer.php';