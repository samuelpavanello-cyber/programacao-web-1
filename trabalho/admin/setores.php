<?php
session_start();
if (!isset($_SESSION['admin_logado'])) { header("Location: index.php"); exit; }
require '../conexao.php';

if (!empty($_POST['nome'])) {
    $pdo->prepare("INSERT INTO setores (nome) VALUES (?)")->execute([trim($_POST['nome'])]);
    header("Location: setores.php"); exit;
}

$setores = $pdo->query("SELECT * FROM setores ORDER BY nome")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Setores</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h1>Setores / Dispositivos</h1>
        
        <form method="POST" style="margin:20px 0;">
            <input type="text" name="nome" placeholder="Ex: Recepção, Caixa, Vendas..." required style="padding:12px; width:350px;">
            <button type="submit" class="botao-principal">Adicionar Setor</button>
        </form>

        <h2>Setores Cadastrados</h2>
        <?php foreach ($setores as $s): ?>
            <div style="padding:12px; border-bottom:1px solid #eee;">
                <strong><?= htmlspecialchars($s['nome']) ?></strong>
                <small style="color:#666;"> (ID: <?= $s['id'] ?>)</small>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>