<div class="container mt-5">
    <h2>Editar Informações do Ticket</h2>
    <form method="POST">
        <div class="form-group">
            <label for="protocolo">Protocolo</label>
            <input type="text" class="form-control" id="protocolo" name="protocolo" value="<?= $ticketData['protocol'] ?>" readonly>
        </div>
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
            <label for="user_id">ID do Usuário</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $ticketData['user_id'] ?>" disabled>
        </div>
        <div class="form-group">
            <label for="responsavel_id">ID do Responsável</label>
            <input type="text" class="form-control" id="responsavel_id" name="responsavel_id" value="<?= $ticketData['responsible_id'] ?>">
        </div>
        <div class="form-group">
            <label for="data_abertura">Data de Abertura</label>
            <input type="text" class="form-control" id="data_abertura" name="data_abertura" value="<?= $ticketData['open_at'] ?>" disabled>
        </div>
        <?php if (!empty($ticketData['closed_at'])) : ?>
            <div class="form-group">
                <label for="data_fechamento">Data de Fechamento</label>
                <input type="text" class="form-control" id="data_fechamento" name="data_fechamento" value="<?= $ticketData['closed_at'] ?>">
            </div>
        <?php endif; ?>
        <?php if (!empty($ticketData['closure_reason'])) : ?>
            <div class="form-group">
                <label for="motivo_fechamento">Motivo de Encerramento</label>
                <input type="text" class="form-control" id="motivo_fechamento" name="motivo_fechamento" value="<?= $ticketData['closure_reason'] ?>">
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="criado_por">Criado por</label>
            <input type="text" class="form-control" id="criado_por" name="criado_por" value="<?= $ticketData['created_by'] ?>" disabled>
        </div>
        <div class="form-group">
            <label for="data_criacao">Data de Criação</label>
            <input type="text" class="form-control" id="data_criacao" name="data_criacao" value="<?= $ticketData['created_at'] ?>" disabled>
        </div>
        <div class="form-group">
            <label for="ultima_atualizacao">Última Atualização</label>
            <input type="text" class="form-control" id="ultima_atualizacao" name="ultima_atualizacao" value="<?= $ticketData['updated_at'] ?>" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>