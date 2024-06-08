//Crie uma view para cadastrar uma aula através de um formulário utilizando CRUD para o banco de dados

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aula</title>
</head>
<body>
    <h1>Cadastrar Aula</h1>
    <form action="AulaController.php" method="post">
        <label for="materia">Matéria:</label>
        <input type="text" name="materia" id="materia" required>
        <br>
        <label for="idProfessor">ID do Professor:</label>
        <input type="number" name="idProfessor" id="idProfessor" required>
        <br>
        <label for="idTurma">ID da Turma:</label>
        <input type="number" name="idTurma" id="idTurma" required>
        <br>
        <label for="dataAula">Data da Aula:</label>
        <input type="date" name="dataAula" id="dataAula" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>