<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link type="image/png" sizes="16x16" rel="icon" href="../../../assets/icons8-school-16.png">
    <link rel="stylesheet" href="../css/faleconosco.css"> 
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-links">
                <a href="../../../../index.php">Home</a>
                <a href="sobre.php">Sobre Nós</a>
                <a href="faleconosco.php">Fale Conosco</a>
            </div>
            <div class="login">
                <img src="../../../assets/user-icon-svgrepo-com.svg" alt="Login" width="24" height="24">
                <a href="login.php">Login</a>
            </div>
        </nav>
    </header>
    
    <main>
        <section class="welcome-section">
            <div class="content">
                <h1>Fale Conosco</h1>
            </div>
        </section>
        <section class="faleconosco-section">
            <div class="content">
                <h2>Entre em Contato</h2>
                <form id="contactForm" method="POST" action="enviar_formulario.php">
                    <label for="nome">Nome:</label><br>
                    <input type="text" id="nome" name="nome"><br>
                    <div id="nomeError" class="error-message"></div><br>
                    
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email"><br>
                    <div id="emailError" class="error-message"></div><br>
                    
                    <label for="mensagem">Mensagem:</label><br>
                    <textarea id="mensagem" name="mensagem" rows="4"></textarea><br>
                    <div id="mensagemError" class="error-message"></div><br>
                    
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </section>

    </main>
    <br><br><br>
    <footer class="footer">
        <div class="content">
            <p>&copy; 2024 Instituto Educacional Nova Era. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('contactForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validacao()) {
                    alert('Formulário enviado com sucesso!');
                    form.reset();
                }
            });

            function validacao() {
                let valid = true;

                const nome = document.getElementById('nome').value.trim();
                if (nome === '') {
                    document.getElementById('nomeError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('nomeError').textContent = '';
                }

                const email = document.getElementById('email').value.trim();
                if (email === '') {
                    document.getElementById('emailError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('emailError').textContent = '';
                }

                const mensagem = document.getElementById('mensagem').value.trim();
                if (mensagem === '') {
                    document.getElementById('mensagemError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('mensagemError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
