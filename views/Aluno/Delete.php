//Crie uma view para deletar uma aula através de um formulário utilizando CRUD para o banco de dados

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletar Aula</title>
</head>
<body>
    <h1>Deletar Aula</h1>
    <form action="AulaController.php" method="post">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id" required>
        <br>
        <button type="submit">Deletar</button>
    </form>
</body>
</html>