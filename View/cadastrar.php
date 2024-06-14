<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/pags/css/cadastrocrud.css">
    <title>Cadastrar Matéria</title>
</head>
<body>
    <h1>Cadastrar Matéria</h1>
    <form id="loginForm" method="POST" action="../Controller/materiaController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome da matéria">
        <div id="nomeError" class="error-message"></div><br><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição da matéria">
        <div id="descricaoError" class="error-message"></div><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('loginForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validacao()) {
   
                    form.submit();
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

                const descricao = document.getElementById('descricao').value.trim();
                if (descricao === '') {
                    document.getElementById('descricaoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('descricaoError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
