<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-links">
                <a href="index.html">Home</a>
                <a href="sobre.html">Sobre Nós</a>
                <a href="faleconosco.html">Fale Conosco</a>
            </div>
            <div class="login">
                <img src="../../../assets/user-icon-svgrepo-com.svg" alt="Login" width="24" height="24">
                <a href="login.php">Login</a>
            </div>
        </nav>
    </header>
    
    <main>
        <section class="login-section">
            <h1>Login</h1>
            <?php if (isset($_GET['error'])): ?>
                <p class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
            <form id="loginForm" method="POST" action="auth.php" onsubmit="return validateForm()">
                <label for="login">Usuário:</label>
                <input type="text" id="login" name="login">
                <div id="loginError" class="error-message"></div>
                
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha">
                <div id="senhaError" class="error-message"></div>
                
                <label>
                    <input type="checkbox" name="lembrar_senha"> Lembrar senha
                </label><br><br>
                
                <button type="submit" id="submitButton">Entrar</button>
            </form>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 Gerenciamento Escolar. Todos os direitos reservados.</p>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('loginForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validateForm()) {
                    // Aqui você pode realizar o envio do formulário via AJAX ou simplesmente alertar o sucesso
                    alert('Login realizado com sucesso!');
                    form.submit(); // Submete o formulário após validação
                }
            });

            function validateForm() {
                let valid = true;

                const login = document.getElementById('login').value.trim();
                if (login === '') {
                    document.getElementById('loginError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('loginError').textContent = '';
                }

                const senha = document.getElementById('senha').value.trim();
                if (senha === '') {
                    document.getElementById('senhaError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('senhaError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
