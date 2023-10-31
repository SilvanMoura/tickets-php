<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Ticket;

session_start();

include __DIR__ . '/includes/header.php';

if (!isset($_SESSION['id_usuario'])) {
    header('location: loginRegister.php');
}else{
    $status = $_GET['status'];
    if($status){
        if ($status == 'success' && $_SESSION['type_usuario'] == "superadmin" || $_SESSION['type_usuario'] == "responsável") {
            $tickets = new Ticket;
            $ticketData = $tickets->getAllTicketsAdmin();
            $_SESSION['AllTicketsAdmin'] = $ticketData;
        }else{
            $tickets = new Ticket;
            $ticketData = $ticket->getAllTicketsByIdPeople();
            $_SESSION['AllTicketsAdmin'] = $ticketData;
        }
        
    }
}



include 'listagem.php';

include __DIR__ . '/includes/footer.php';
?>