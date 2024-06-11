<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form method="post" action="LoginController.php">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>
        <input type="checkbox" name="lembrar_senha" value="1"> Lembrar senha<br><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>