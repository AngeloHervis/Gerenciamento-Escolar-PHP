<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/pags/css/cadastrocrud.css">
    <title>Cadastrar Sala</title>
</head>
<body>
    <h1>Cadastrar Sala</h1>
    <form id="salaForm" method="POST" action="../Controller/salaController.php?action=C">
        <label>Número da Sala:</label>
        <input type="text" name="numero_sala" id="numero_sala" placeholder="Número da sala" >
        <div id="numeroSalaError" class="error-message"></div><br><br>

        <label>Capacidade:</label>
        <input type="text" name="capacidade" id="capacidade" placeholder="Capacidade da sala" >
        <div id="capacidadeError" class="error-message"></div><br><br>

        <label>Localização:</label>
        <input type="text" name="localizacao" id="localizacao" placeholder="Localização da sala" >
        <div id="localizacaoError" class="error-message"></div><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('salaForm');

            form.addEventListener('submit', function(event) {
                event.preventDefault();
                if (validacao()) {
                    form.submit();
                }
            });

            function validacao() {
                let valid = true;

                const numeroSala = document.getElementById('numero_sala').value.trim();
                if (numeroSala === '') {
                    document.getElementById('numeroSalaError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('numeroSalaError').textContent = '';
                }

                const capacidade = document.getElementById('capacidade').value.trim();
                if (capacidade === '') {
                    document.getElementById('capacidadeError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('capacidadeError').textContent = '';
                }

                const localizacao = document.getElementById('localizacao').value.trim();
                if (localizacao === '') {
                    document.getElementById('localizacaoError').textContent = 'Campo obrigatório';
                    valid = false;
                } else {
                    document.getElementById('localizacaoError').textContent = '';
                }

                return valid;
            }
        });
    </script>
</body>
</html>
