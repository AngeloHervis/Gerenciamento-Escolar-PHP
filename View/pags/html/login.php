<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        
        body {
            font-family: "Roboto Slab", serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
        }
        .navbar a:hover {
            background-color: #575757;
        }
        .login img {
            margin-right: 10px;
        }
        .login-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px 20px;
        }
        .login-section h1 {
            margin-bottom: 20px;
        }
        .login-section form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background-color: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-section form label,
        .login-section form input,
        .login-section form button {
            margin-bottom: 10px;
            width: 100%;
        }
        .error-message {
            color: #ff0000;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
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
                <img src="/assets/user-icon-svgrepo-com.svg" alt="Login" width="24" height="24">
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
        
                    alert('Login realizado com sucesso!');
                    form.submit(); 
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
