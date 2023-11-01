<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\User;
use App\Entity\Ticket;

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $user = new User();
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->status = "Ativo";
    $user->userType = "normal";
    $user->register();
    
    header('location: index.php');
}
if(isset($_POST['name']) && isset($_POST['password']) && !isset($_POST['email'])) {
    $user = new User();
    $user->name = $_POST['name'];
    $user->password = $_POST['password'];
    $user->login(); 

    $ticket = new Ticket();
    $ticket->id = $_SESSION['id_usuario'];
    $ticket->name = $_SESSION['name_usuario'];
    $ticket->userType = $_SESSION['type_usuario'];

    // Obtém os tickets para o usuário administrador
    if($_SESSION['type_usuario'] == 'superadmin'){
        $tickets = $ticket->getAllTicketsAdmin();
    }else{
        $tickets = $ticket->getAllTicketsByIdPeople();
    }
    
    session_start();
    $_SESSION['AllTicketsAdmin'] = $tickets;

    header('location: index.php');
}
?>  

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <div id="loginHeader">Tela de Login</div>
                    <div id="registerHeader" style="display: none;">Cadastro de Usuário</div>
                </div>
                <div class="card-body" id="loginBody">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Nome de usuário</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome de usuário">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        <button type="button" class="btn btn-link" onclick="showRegisterForm()">Registrar</button>
                    </form>
                </div>
                <div class="card-body" id="registerBody" style="display: none;">
                    <form method="post">
                        <div class="form-group">
                            <label for="name">Nome:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" class="btn btn-link" onclick="showLoginForm()">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript para alternar entre os formulários (login/registro) continua o mesmo
    function showRegisterForm() {
        document.getElementById('loginBody').style.display = 'none';
        document.getElementById('registerBody').style.display = 'block';
        document.getElementById('loginHeader').style.display = 'none';
        document.getElementById('registerHeader').style.display = 'block';
    }

    function showLoginForm() {
        document.getElementById('loginBody').style.display = 'block';
        document.getElementById('registerBody').style.display = 'none';
        document.getElementById('loginHeader').style.display = 'block';
        document.getElementById('registerHeader').style.display = 'none';
    }
</script>