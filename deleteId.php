<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

$id = $_GET['id'];

$protocolInfo = new Ticket();
$protocolInfo->id = $id;
$ticketData = $protocolInfo->getTicketsById();

if(isset($_POST['excluir'])){
    $protocolInfo->id = $id;
    
    $protocolInfo->deleteTicketsById();
    header('location: index.php?status=success');
    exit;
  }

include __DIR__ . '/includes/header.php';
include __DIR__. '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
