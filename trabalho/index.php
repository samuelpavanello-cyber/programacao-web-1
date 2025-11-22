<?php
require 'conexao.php';

$stmt = $pdo->query("SELECT * FROM perguntas ORDER BY ordem");
$perguntas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Avaliação de Serviços</h1>

        <form action="confirmacao.php" method="POST" id="formulario" data-total="<?= count($perguntas) ?>">
            <?php foreach ($perguntas as $i => $p): ?>
                <div class="pergunta" id="pergunta-<?= $i ?>" style="display: none;">
                    <p><strong><?= ($i + 1) ?>. <?= htmlspecialchars($p['texto']) ?></strong></p>
                    <div class="escala">
                        <?php for ($n = 0; $n <= $p['escala']; $n++): ?>
                            <label>
                                <input type="radio" name="resposta[<?= $p['id'] ?>]" value="<?= $n ?>" required>
                                <span><?= $n ?></span>
                            </label>
                        <?php endfor; ?>
                    </div>
                    <button type="button" class="proxima" onclick="proxima(<?= $i ?>)">Próxima</button>
                </div>
            <?php endforeach; ?>

            <div class="pergunta" id="feedback" style="display: none;">
                <p><strong>Feedback adicional (opcional):</strong></p>
                <textarea name="feedback" rows="4" placeholder="Escreva aqui..."></textarea>
                <button type="submit">Enviar Avaliação</button>
            </div>
        </form>

        <footer>
            <p>Sua avaliação é anônima.</p>
        </footer>

        <div style="text-align:center; margin:60px 0;">
            <a href="admin/" style="color:#2c3e50; font-size:14px; text-decoration:none; border-bottom:1px dashed #2c3e50;">
                acesso administrativo
            </a>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>