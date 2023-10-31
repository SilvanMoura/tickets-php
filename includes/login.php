<?php
    use App\Entity\User;

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    
        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $user->status = "Ativo";
        $user->userType = "normal";
        $user->register();
        
        header('location: index.php');
        exit;
    }
    if(isset($_POST['name']) && isset($_POST['password']) && !isset($_POST['email'])) {
        $user = new User();
        $user->name = $_POST['name'];
        $user->password = $_POST['password'];
        $user->login(); 
        if(isset($_SESSION['id_usuario'])){
            header('location: index.php');
            exit;
        }
    }

    include __DIR__ . 'header.php';
?>



<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    Tela de Login
                </div>
                <div class="card-body">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>