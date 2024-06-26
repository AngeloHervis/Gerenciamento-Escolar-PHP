<?php
include_once('../Model/materia.php'); 

$materias = new Materia();
$resultado = $materias->ListarMaterias(); 

if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../View/pags/css/listar.css">
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
                echo "<td><a href='../Controller/materiaController.php?action=delete&id=" . $materia['id'] . "'>Excluir</a></td>"; 
                echo "<td><a href='../View/editar.php?id=" . $materia['id'] . "'>Editar</a></td>";
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
