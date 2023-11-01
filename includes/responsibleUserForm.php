<div class="container mt-5">
        <h2>Cadastro de Usuário Especial</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="nivel">Nível de Acesso:</label>
                <select class="form-control" id="nivel" name="nivel">
                    <option value="responsavel">Responsável</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar Usuário Especial</button>
        </form>
    </div>