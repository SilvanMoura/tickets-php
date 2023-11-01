<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\User;

session_start();

if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {

    $userCreate = new User();

    $userCreate->name = $_POST['nome'];
    $userCreate->email = $_POST['email'];
    $userCreate->password = $_POST['senha'];
    $userCreate->status = 'Ativo';
    $userCreate->creatorId = $_SESSION['id_usuario'];
    $userCreate->userType = $_POST['nivel'];
    $userCreate->register();
    
    header('location: createUser.php');
    exit;
}



    include __DIR__ . '/includes/header.php';
    include __DIR__ . '/includes/commomUserForm.php';
    include __DIR__ . '/includes/footer.php';