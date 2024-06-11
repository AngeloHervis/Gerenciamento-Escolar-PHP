<?php
include_once('../Model/Materia.php');
$materias = new Materia();
$resultado = $materias->listarMaterias();
if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Matérias</title>
</head>

<body>
    <h1>Lista de Matérias</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $materia) {
                echo "<tr>";
                echo "<td>" . $materia['nome'] . "</td>";
                echo "<td>" . $materia['descricao'] . "</td>";
                echo "<td><a href='../Controller/MateriaController.php?action=delete&id=" . $materia['id'] . "'>Excluir</a></td>"; // Cor
                echo "<td><a href='../View/Editar.php?id=" . $materia['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<?php
} else {
    echo "Não há matérias cadastradas.";
}
?>