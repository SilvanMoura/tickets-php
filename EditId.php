<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

session_start();

$id = $_GET['id'];

$protocolInfo = new Ticket();
$protocolInfo->id = $id;
$ticketData = $protocolInfo->getTicketsById();

if (isset($_POST['titulo'], $_POST['tipo'])) {
      
    $protocolInfo->id = $_POST['protocolo'];
    $protocolInfo->title = $_POST['titulo'];
    $protocolInfo->type = $_POST['tipo'];
    $protocolInfo->descricao = $_POST['descricao'];
    $protocolInfo->responseId = $_POST['responsavel_id'];
    $protocolInfo->closeData = $_POST['data_fechamento'];
    $protocolInfo->closeReason = $_POST['motivo_fechamento'];
    $protocolInfo->creatorId = $_SESSION['id_usuario'];

    $protocolInfo->updateTicketsById();
    
    header('location: index.php?status=success');
    exit;
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/editForm.php';
include __DIR__ . '/includes/footer.php';