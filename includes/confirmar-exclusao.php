<main>

  <h2 class="mt-3">Excluir Ticket</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir o Ticket <strong><?=$ticketData['title']?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="index.php">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>

<style>
    main {
  margin: 20px;
  padding: 20px;
  background-color: #f7f7f7;
  border: 1px solid #ddd;
  border-radius: 5px;
}

h2.mt-3 {
  font-size: 24px;
  margin-top: 10px;
}

form {
  margin-top: 20px;
}

.form-group {
  margin: 10px 0;
}

p {
  font-size: 18px;
}

.btn {
  padding: 10px 20px;
  font-size: 18px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  margin-right: 10px;
}

.btn-success {
  background-color: #28a745;
  color: #fff;
}

.btn-danger {
  background-color: #dc3545;
  color: #fff;
}

</style>