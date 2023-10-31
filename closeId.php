<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

// Verifique se o ID foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $protocolInfo = new Ticket();
    $protocolInfo->id = $id;
    $ticketData = $protocolInfo->getTicketsById();
} else {
    // Lógica para lidar com a falta de ID (por exemplo, redirecionar para uma página de erro)
    header('location: error.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['closure_reason'])) {
    
    $id = $_GET['id'];
    $reason = $_POST['closure_reason'];
    
    $protocolInfo = new Ticket();
    $protocolInfo->id = $id;
    $protocolInfo->closeReason = $reason;
    $result = $protocolInfo->closeTicketsById();

    if ($result === "success") {
        header('location: index.php?status=success');
        exit;
    } else {
        // Lógica para lidar com um erro ao fechar o ticket (por exemplo, redirecionar para uma página de erro)
        header('location: error.php');
        exit;
    }
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirm-close.php';
include __DIR__ . '/includes/footer.php';
?>
