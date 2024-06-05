<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <div class="conteudo">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultData as $data): ?>
                    <tr>
                        <td><?php echo $data ['Nome'] ?></td>
                        <td><?php echo $data ['Idade'] ?></td>
                        <td><?php echo $data ['Endereço'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>