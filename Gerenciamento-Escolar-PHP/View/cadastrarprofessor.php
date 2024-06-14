<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/pags/css/cadastrocrud.css">
    <title>Cadastrar Professor</title>
</head>
<body>
    <h1>Cadastrar Professor</h1>
    <form id="professorForm" method="POST" action="../Controller/professorController.php?action=C">
        <label>Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Nome do professor">
        <div id="nomeError" class="error-message"></div><br><br>
        
        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome do professor">
        <div id="sobrenomeError" class="error-message"></div><br><br>

        <label>Graduação:</label>
        <input type="text" name="graduacao" id="graduacao" placeholder="Graduação">
        <div id="graduacaoError" class="error-message"></div><br><br>

        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento">
        <div id="dataNascimentoError" class="error-message"></div><br><br>

        <label>Id da matéria:</label>
        <input type="text" name="materia_id" id="materia_id" placeholder="Id da matéria">
        <div id="materiaIdError" class="error-message"></div><br><br>
        
        <button type="submit">Cadastrar</button><br><br>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('professorForm');

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

                const graduacao = document.getElementById('graduacao').value.trim();
                if (graduacao === '') {
                    document.getElementById('graduacaoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('graduacaoError').textContent = '';
                }

                const dataNascimento = document.getElementById('data_nascimento').value;
                if (dataNascimento === '') {
                    document.getElementById('dataNascimentoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('dataNascimentoError').textContent = '';
                }

                const materiaId = document.getElementById('materia_id').value.trim();
                if (materiaId === '') {
                    document.getElementById('materiaIdError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('materiaIdError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
