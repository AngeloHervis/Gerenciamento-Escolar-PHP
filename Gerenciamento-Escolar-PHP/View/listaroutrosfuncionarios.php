<?php
include_once('../Model/outrofuncionario.php'); 

$outroFuncionario = new OutroFuncionario();
$resultado = $outroFuncionario->ListarOutroFuncionario(); 

if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../View/pags/css/listar.css">
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
                echo "<td><a href='../Controller/outrofuncionarioController.php?action=delete&id=" . $outroFuncionario['id'] . "'>Excluir</a></td>"; 
                echo "<td><a href='../View/editar.php?id=" . $outroFuncionario['id'] . "'>Editar</a></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
</body>
</html>

<?php
} else {
    echo "Não há funcionários cadastrados.";
}
?>
