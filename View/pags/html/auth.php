<?php
session_start();

$usuarios = [
    'professor' => [
        'senha_hash' => password_hash('123456', PASSWORD_DEFAULT),
        'tipo' => 'professor'
    ],
    'funcionario' => [
        'senha_hash' => password_hash('abc123', PASSWORD_DEFAULT),
        'tipo' => 'funcionario'
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Verificar se o usuário existe e a senha está correta
    if (array_key_exists($login, $usuarios) && password_verify($senha, $usuarios[$login]['senha_hash'])) {
        $_SESSION['login'] = $login;
        $_SESSION['tipo'] = $usuarios[$login]['tipo'];

        // Definir cookie de lembrar senha se marcado
        if (isset($_POST['lembrar_senha'])) {
            setcookie('login', $login, time() + 3600 * 24 * 30, '/'); // Cookie válido por 30 dias
            setcookie('senha', $senha, time() + 3600 * 24 * 30, '/');
        } else {
            // Limpar cookies se não marcado
            setcookie('login', '', time() - 3600, '/');
            setcookie('senha', '', time() - 3600, '/');
        }

        // Redirecionamento com base no tipo de usuário
        if ($_SESSION['tipo'] === 'professor') {
            header('Location: dashboardprofessor.php');
        } elseif ($_SESSION['tipo'] === 'funcionario') {
            header('Location: dashboardfuncionario.php');
        }
        exit;
    } else {
        $error_message = 'Credenciais inválidas. Tente novamente.';
        header('Location: login.php?error=' . urlencode($error_message));
        exit;
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    setcookie('login', '', time() - 3600, '/');
    setcookie('senha', '', time() - 3600, '/');
    header('Location: login.php');
    exit;
}
?>
