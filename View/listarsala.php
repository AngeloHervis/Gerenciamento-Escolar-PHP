<?php
include_once('../Model/Sala.php');
$salas = new Sala();
$resultado = $salas->listarSala();
if (count($resultado) > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Salas</title>
</head>

<body>
    <h1>Lista de Salas</h1>
    <table>
        <thead>
            <tr>
                <th>Número da Sala</th>
                <th>Capacidade</th>
                <th>Localização</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultado as $sala) {
                echo "<tr>";
                echo "<td>" . $sala['numero_sala'] . "</td>";
                echo "<td>" . $sala['capacidade'] . "</td>";
                echo "<td>" . $sala['localizacao'] . "</td>";
                echo "<td><a href='../Controller/SalaController.php?action=delete&id=" . $sala['id'] . "'>Excluir</a></td>";
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