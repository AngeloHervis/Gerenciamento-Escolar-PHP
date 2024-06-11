<?php
include_once('../Model/OutroFuncionario.php');
$outroFuncionario = new OutroFuncionario();
$resultado = $outroFuncionario->listarOutroFuncionario();
if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Funcionários</title>
</head>

<body>
    <h1>Lista de Funcionários</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Data de Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $outroFuncionario) {
                echo "<tr>";
                echo "<td>" . $outroFuncionario['nome'] . "</td>";
                echo "<td>" . $outroFuncionario['cargo'] . "</td>";
                echo "<td>" . $outroFuncionario['data_nascimento'] . "</td>";
                echo "<td><a href='../Controller/OutroFuncionarioController.php?action=delete&id=" . $outroFuncionario['id'] . "'>Excluir</a></td>";
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
    echo "Não há funcionários cadastradas.";
}
?>