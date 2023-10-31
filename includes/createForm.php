<div class="container mt-5">
    <h2>Criar Ticket</h2>
    <form method="POST">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $ticketData['title'] ?>">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $ticketData['type'] ?>">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"><?= $ticketData['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="responsavel_id">ID do Responsável</label>
            <input type="number" class="form-control" id="responsavel_id" name="responsavel_id" value="<?= $ticketData['responsible_id'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>