<?php
session_start();
if (!isset($_SESSION['admin_logado'])) { header("Location: index.php"); exit; }
require '../conexao.php';

$setores = $pdo->query("SELECT * FROM setores ORDER BY nome")->fetchAll();
$base_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME'], 2) . "/index.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tablets</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container">
        <h1>Tablets por Setor</h1>
        <p>Links para configurar os tablets:</p>

        <?php foreach ($setores as $s): ?>
            <div class="tablet-linha">
                <strong><?= htmlspecialchars($s['nome']) ?></strong><br>
                <span class="tablet-link"><?= $base_url ?>?setor=<?= $s['id'] ?></span>
                <button class="tablet-btn" onclick="copiar('<?= $base_url ?>?setor=<?= $s['id'] ?>')">
                    Copiar
                </button>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function copiar(texto) {
            navigator.clipboard.writeText(texto);
            alert("Link copiado!");
        }
    </script>
</body>
</html>