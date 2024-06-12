<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="loginController.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="checkbox" id="lembrar_senha" name="lembrar_senha" value="1">
        <label for="lembrar_senha">Lembrar senha</label><br><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Usuário ou senha inválidos</p>";
    }
    ?>
</body>
</html>
