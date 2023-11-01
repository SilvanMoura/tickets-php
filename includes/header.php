<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header('location: loginRegister.php');
}

//session_destroy();
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    // Realize a ação de logout, como destruir a sessão, redirecionar, etc.
    session_destroy(); // Exemplo: Destruir a sessão

    // Redirecione para a página de login ou outra página de sua escolha
    header('location: loginRegister.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Ticket(s)</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar li {
            margin-right: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: #fff;
        }

        /* Estilos do conteúdo à direita */
        .content {
            text-align: right;
            padding: 20px;
        }

        .table-center {
            margin: 0 auto;
            width: 90%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <ul>
            <?php
            session_start();

            if (isset($_SESSION['type_usuario']) && $_SESSION['type_usuario'] === 'superadmin') {
                echo '<li><a href="createUser.php">Criar novos usuários</a></li>';
            }
            ?>
            <li><a href="systemParams.php">Parâmetros do sistema</a></li>
            <li><a href="#">Avaliar/Movimentar tickets</a></li>
        </ul>
        <div class="content">
            <?= $_SESSION['name_usuario'] ?> | <a href="?logout=true">Sair</a>
        </div>

    </div>