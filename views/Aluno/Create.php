//Crie uma view para cadastrar um aluno através de um formulário utilizando CRUD para o banco de dados

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
</head>

<body>
    <h1>Cadastrar Aluno</h1>
    <form action="AlunoController.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="dataNascimento">Data de Nascimento:</label>
        <input type="date" name="dataNascimento" id="dataNascimento" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required>
        <br>
        <label for="idTurma">ID da Turma:</label>
        <input type="number" name="idTurma" id="idTurma" required>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>