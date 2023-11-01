<div class="container mt-5">
    <h2>Editar Informações do Domínio</h2>
    <form method="POST">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $domainData['name'] ?>">
        </div>
        <div class="form-group">
            <label for="domain">Domínio</label>
            <input type="text" class="form-control" id="domain" name="domain" value="<?= $domainData['domain'] ?>">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="Ativo" <?php echo ($domainData['status'] == 'Ativo') ? 'selected' : ''; ?>>Ativo</option>
                <option value="Inativo" <?php echo ($domainData['status'] == 'Inativo') ? 'selected' : ''; ?>>Inativo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>