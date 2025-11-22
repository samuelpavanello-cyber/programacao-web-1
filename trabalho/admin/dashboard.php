<?php
session_start();
if (!isset($_SESSION['admin_logado'])) { header("Location: index.php"); exit; }
require '../conexao.php';

$totalAvaliacoes = $pdo->query("SELECT COUNT(*) FROM respostas")->fetchColumn();
$totalSetores    = $pdo->query("SELECT COUNT(*) FROM setores")->fetchColumn();

$stmt = $pdo->query("
    SELECT s.id, s.nome, COALESCE(AVG(r.nota), 0) AS media
    FROM setores s
    LEFT JOIN respostas r ON r.setor_id = s.id
    GROUP BY s.id, s.nome
    ORDER BY media DESC
");
$mediasSetores = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Avaliações</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card { background:#f8f9fa; padding:25px; border-radius:12px; text-align:center; }
        .grid { display:grid; grid-template-columns: repeat(auto-fit, minmax(250px,1fr)); gap:20px; margin:30px 0; }
        canvas { max-height:400px; margin:30px 0; }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>

    <div class="container">
        <h1 style="text-align:center; color:#2c3e50;">Dashboard - Avaliações</h1>

        <div class="grid">
            <div class="card">
                <h2 style="color:#3498db; font-size:3em; margin:0;"><?= $totalAvaliacoes ?></h2>
                <p>Total de Avaliações</p>
            </div>
            <div class="card">
                <h2 style="color:#27ae60; font-size:3em; margin:0;"><?= $totalSetores ?></h2>
                <p>Setores Configurados</p>
            </div>
        </div>

        <h2 style="color:#2c3e50;">Média por Setor</h2>
        <canvas id="grafico"></canvas>

        <h2 style="margin-top:40px; color:#2c3e50;">Tabela de Médias</h2>
        <table width="100%" style="border-collapse:collapse; background:white;">
            <tr style="background:#34495e; color:white;">
                <th style="padding:15px; text-align:left;">Setor</th>
                <th style="padding:15px;">Média</th>
            </tr>
            <?php foreach ($mediasSetores as $s): ?>
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:15px; font-weight:bold;"><?= htmlspecialchars($s['nome']) ?></td>
                <td style="padding:15px; font-size:1.4em; color:#27ae60;">
                    <?= number_format($s['media'], 1) ?> / 10
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <script>
        const ctx = document.getElementById('grafico').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?= "'" . implode("','", array_column($mediasSetores, 'nome')) . "'" ?>],
                datasets: [{
                    label: 'Média das Notas',
                    data: [<?= implode(',', array_column($mediasSetores, 'media')) ?>],
                    backgroundColor: '#27ae60',
                    borderColor: '#1e8449',
                    borderWidth: 2
                }]
            },
            options: {
                scales: { y: { beginAtZero: true, max: 10 } },
                plugins: { legend: { display: false } }
            }
        });
    </script>
</body>
</html>