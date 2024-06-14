<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/pags/css/cadastrocrud.css">
    <title>Cadastrar Funcionário</title>
</head>
<body>
    <h1>Cadastrar Funcionário</h1>
    <form id="funcionarioForm" method="POST" action="../Controller/outrofuncionarioController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do funcionário">
        <div id="nomeError" class="error-message"></div><br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" id="cargo" placeholder="Cargo">
        <div id="cargoError" class="error-message"></div><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento">
        <div id="dataNascimentoError" class="error-message"></div><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('funcionarioForm');

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

                const cargo = document.getElementById('cargo').value.trim();
                if (cargo === '') {
                    document.getElementById('cargoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('cargoError').textContent = '';
                }

                const dataNascimento = document.getElementById('data_nascimento').value;
                if (dataNascimento === '') {
                    document.getElementById('dataNascimentoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('dataNascimentoError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
