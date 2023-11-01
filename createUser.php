<?php
    include __DIR__ . '/includes/header.php';
?>
<div class="container mt-5">
        <h2>Cadastro de Usuários</h2>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuário Comum</h5>
                        <p class="card-text">Clique no botão abaixo para cadastrar um usuário comum.</p>
                        <a href="commomUser.php" class="btn btn-primary">Cadastrar Usuário Comum</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuário Responsável</h5>
                        <p class="card-text">Clique no botão abaixo para cadastrar um usuário responsável.</p>
                        <a href="responsibleUser.php" class="btn btn-success">Cadastrar Usuário Responsável</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include __DIR__ . '/includes/footer.php';
?>