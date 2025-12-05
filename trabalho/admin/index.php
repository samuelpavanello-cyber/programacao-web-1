<?php
session_start();

if (isset($_SESSION['admin_logado'])) {
    header("Location: dashboard.php");
    exit;
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../conexao.php';

    $login = trim($_POST['login']);
    $senha = trim($_POST['senha']);

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
    $stmt->execute([$login, $senha]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['admin_logado'] = true;
        $_SESSION['admin_nome'] = $user['login'];
        header("Location: dashboard.php");
        exit;
    } else {
        $mensagem = "Login ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <style>
        .login-box {
            max-width: 400px;
            margin: 100px auto;
            text-align: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .erro {
            color: red;
            font-weight: bold;
            margin: 10px 0;
        }

        small {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container login-box">
        <h1>Área Administrativa</h1>

        <?php if ($mensagem): ?>
            <p class="erro"><?= $mensagem ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="login" placeholder="Usuário" required autofocus>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="hidden" name="setor_id" value="<?= (int) ($_GET['setor'] ?? 5) ?>">
            <button type="submit" class="botao-principal">Entrar</button>
        </form>

        <br>
        <small>Usuário: <b>admin</b><br>Senha: <b>admin123</b></small>
    </div>

    <p style="text-align:center; margin:50px 0 20px;">
        <a href="../index.php"
            style="color:#27ae60; font-weight:bold; text-decoration:none; border-bottom:1px dashed #27ae60;">
            Voltar para o formulário de avaliação
        </a>
    </p>
</body>

</html>