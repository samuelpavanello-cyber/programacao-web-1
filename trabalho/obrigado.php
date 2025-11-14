<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $respostas = $_POST['resposta'] ?? [];
    $feedback = trim($_POST['feedback'] ?? '');

    try {
        $pdo->beginTransaction();

        foreach ($respostas as $pergunta_id => $nota) {
            $nota = (int)$nota;
            $stmt = $pdo->prepare("INSERT INTO respostas (pergunta_id, nota, feedback) VALUES (?, ?, ?)");
            $stmt->execute([$pergunta_id, $nota, $feedback ?: null]);
        }

        $pdo->commit();
    } catch (Exception $e) {
        $pdo->rollBack();
        die("Erro ao salvar: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obrigado!</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <div class="container center">
        <h1>Obrigado!</h1>
        <p class = "msg-final">Agradecemos a sua Avaliação, volte sempre!</p>
        <button type="button" class="botao-principal" onclick="window.location.href='index.php'">Nova Avaliação</button>
    </div>
</body>
</html>