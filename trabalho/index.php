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

            <input type="hidden" name="setor_id" value="<?= (int) ($_GET['setor'] ?? 5) ?>">

            <?php foreach ($perguntas as $i => $pergunta): ?>
                <div class="pergunta" id="pergunta-<?= $i ?>" style="display: none;">
                    <p><strong><?= ($i + 1) ?>. <?= htmlspecialchars($pergunta['texto']) ?></strong></p>
                    <div class="escala">
                        <?php for ($nota = 0; $nota <= $pergunta['escala']; $nota++): ?>
                            <label>
                                <input type="radio" name="resposta[<?= $pergunta['id'] ?>]" value="<?= $nota ?>" required>
                                <span><?= $nota ?></span> 
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
    </div>

    <div style="text-align:center; margin:60px 0 20px;">
        <a href="admin/" style="color:#2c3e50; font-size:14px; text-decoration:none; border-bottom:1px dashed #2c3e50;">
            Painel Administrativo
        </a>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>