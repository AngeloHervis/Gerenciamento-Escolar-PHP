<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aula</title>
</head>
<body>
    <h1>Cadastrar Aula</h1>
    <form method="POST" action="../Controller/aulaController.php?action=C">
        <label>Horário de Início:</label>
        <input type="datetime-local" name="horario_inicio" required><br><br>

        <label>Horário de Fim:</label>
        <input type="datetime-local" name="horario_fim" required><br><br>

        <label>Disciplina:</label>
        <select name="disciplina_id" required>
            <?php
          
            include_once('../Model/materia.php');

          
            $materias = new Materia();

            $resultado = $materias->ListarMaterias();

           
            if (count($resultado) > 0) {
               
                foreach ($resultado as $materia) {
                    echo "<option value='" . $materia['id'] . "'>" . $materia['nome'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma disciplina cadastrada</option>";
            }
            ?>
        </select><br><br>

        <label>Professor:</label>
        <select name="professor_id" required>
            <?php
            
            include_once('../Model/professor.php');

            $professores = new Professor();

            $resultado = $professores->ListaProfessor();

            if (count($resultado) > 0) {
          
                foreach ($resultado as $professor) {
                    echo "<option value='" . $professor['id'] . "'>" . $professor['nome'] . " " . $professor['sobrenome'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum professor cadastrado</option>";
            }
            ?>
        </select><br><br>

        <label>Sala:</label>
        <input type="text" name="sala_id" placeholder="ID da Sala" required><br><br>

        <button type="submit">Cadastrar</button><br><br>
    </form>
</body>
</html>
