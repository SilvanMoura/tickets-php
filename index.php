<?php
    session_start();
    
    include __DIR__ . '/includes/header.php';

    use App\Entity\User;

    if(!isset($_SESSION['id_usuario'])){
        header('location: loginRegister.php');
    }

    //include __DIR__ . '/includes/listagem.php';
    include __DIR__ . '/includes/footer.php';