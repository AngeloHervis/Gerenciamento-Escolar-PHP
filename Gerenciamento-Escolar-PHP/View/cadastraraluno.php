<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/pags/css/cadastrocrud.css">
    <title>Cadastrar Aluno</title>
</head>
<body>
    <h1>Cadastrar Aluno</h1>
    <form id="alunoForm" method="POST" action="../Controller/alunocontroller.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do aluno">
        <div id="nomeError" class="error-message"></div><br><br>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome do aluno" >
        <div id="sobrenomeError" class="error-message"></div><br><br>

        <label>Série:</label>
        <input type="text" name="serie" id="serie" placeholder="Série" >
        <div id="serieError" class="error-message"></div><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento" >
        <div id="dataNascimentoError" class="error-message"></div><br><br>

        <label>Sala ID:</label>
        <input type="number" name="sala_id" id="sala_id" placeholder="ID da Sala" >
        <div id="salaIdError" class="error-message"></div><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('alunoForm');

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

                const sobrenome = document.getElementById('sobrenome').value.trim();
                if (sobrenome === '') {
                    document.getElementById('sobrenomeError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('sobrenomeError').textContent = '';
                }

                const serie = document.getElementById('serie').value.trim();
                if (serie === '') {
                    document.getElementById('serieError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('serieError').textContent = '';
                }

                const dataNascimento = document.getElementById('data_nascimento').value;
                if (dataNascimento === '') {
                    document.getElementById('dataNascimentoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('dataNascimentoError').textContent = '';
                }

                const salaId = document.getElementById('sala_id').value.trim();
                if (salaId === '') {
                    document.getElementById('salaIdError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('salaIdError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
