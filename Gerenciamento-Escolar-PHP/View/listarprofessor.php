<?php
include_once('../Model/professor.php'); 

$professores = new Professor();
$resultado = $professores->ListaProfessor(); 

if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../View/pags/css/listar.css">
    <title>Lista de Professores</title>
</head>
<body>
    <h1>Lista de Professores</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Graduação</th>
                <th>Data de Nascimento</th>
                <th>Matéria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $professor) {
                echo "<tr>";
                echo "<td>" . $professor['nome'] . "</td>";
                echo "<td>" . $professor['sobrenome'] . "</td>";
                echo "<td>" . $professor['graduacao'] . "</td>";
                echo "<td>" . $professor['data_nascimento'] . "</td>";
                echo "<td>" . $professor['nome_materia'] . "</td>";
                echo "<td><a href='../Controller/professorController.php?action=delete&id=" . $professor['id'] . "'>Excluir</a></td>"; 
                echo "<td><a href='../View/editar.php?id=" . $professor['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
} else {
    echo "Não há professores cadastrados.";
}
?>
