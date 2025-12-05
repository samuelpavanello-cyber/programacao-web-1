<?php
session_start();
if (!isset($_SESSION['admin_logado'])) {
    header("Location: index.php");
    exit;
}
require '../conexao.php';

if ($_POST) {
    $texto = trim($_POST['texto']);
    $escala = (int) $_POST['escala'];
    $ordem = (int) $_POST['ordem'];
    $id = (int) $_POST['id'];

    if ($id > 0) {

        $pdo->prepare("UPDATE perguntas SET texto=?, escala=?, ordem=? WHERE id=?")
            ->execute([$texto, $escala, $ordem, $id]);
    } else {

        $pdo->prepare("INSERT INTO perguntas (texto, escala, ordem) VALUES (?,?,?)")
            ->execute([$texto, $escala, $ordem]);
    }
    header("Location: perguntas.php");
    exit;
}

if (isset($_GET['excluir'])) {
    $id = (int) $_GET['excluir'];
    $pdo->prepare("DELETE FROM perguntas WHERE id = ?")->execute([$id]);
    header("Location: perguntas.php");
    exit;
}

$edit = null;
if (isset($_GET['editar'])) {
    $id = (int) $_GET['editar'];
    $edit = $pdo->query("SELECT * FROM perguntas WHERE id = $id")->fetch();
}

$perguntas = $pdo->query("SELECT * FROM perguntas ORDER BY ordem, id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Perguntas</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>

<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h1>Perguntas</h1>

        <form method="POST" style="background:#f8f9fa;padding:20px;border-radius:8px;margin-bottom:30px;">
            <input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">
            <p>
                <input type="text" name="texto" placeholder="Texto da pergunta" required
                    value="<?= htmlspecialchars($edit['texto'] ?? '') ?>" style="width:100%;padding:10px;">
            </p>
            <p>
                <label>Escala: </label>
                <select name="escala">
                    <option value="5" <?= (isset($edit['escala']) && $edit['escala'] == 5) ? 'selected' : '' ?>>0 a 5
                    </option>
                    <option value="10" <?= (!isset($edit['escala']) || $edit['escala'] == 10) ? 'selected' : '' ?>>0 a 10
                    </option>
                </select>
                <input type="number" name="ordem" placeholder="Ordem" required min="0"
                    value="<?= $edit['ordem'] ?? '' ?>" style="width:80px;margin-left:10px;">
                <button type="submit" class="botao-principal">
                    <?= $edit ? 'Salvar Alterações' : 'Adicionar Pergunta' ?>
                </button>
                <?php if ($edit): ?>
                    <a href="perguntas.php" style="margin-left:10px;">Cancelar</a>
                <?php endif; ?>
            </p>
        </form>

        <table width="100%" style="border-collapse:collapse;">
            <tr style="background:#2c3e50;color:white;">
                <th style="padding:15px;text-align:left;">Ordem</th>
                <th style="padding:15px;text-align:left;">Pergunta</th>
                <th style="padding:15px;text-align:left;">Escala</th>
                <th style="padding:15px;">Ações</th>
            </tr>
            <?php foreach ($perguntas as $p): ?>
                <tr style="border-bottom:1px solid #ddd;">
                    <td style="padding:15px;"><?= $p['ordem'] ?></td>
                    <td style="padding:15px;"><?= htmlspecialchars($p['texto']) ?></td>
                    <td style="padding:15px;">0 a <?= $p['escala'] ?></td>
                    <td style="padding:15px;">
                        <a href="?editar=<?= $p['id'] ?>" style="color:#3498db;margin-right:15px;">Editar</a>
                        <a href="?excluir=<?= $p['id'] ?>" onclick="return confirm('Tem certeza que quer excluir?')"
                            style="color:#e74c3c;">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>