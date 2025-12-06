<?php
require_once 'lab1.php';


$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

if ($busca != '') {
    $sql = "SELECT * FROM tbpessoa WHERE pesnome ILIKE $1 ORDER BY pesnome";
    $res = pg_query_params($condb, $sql, array('%'.$busca.'%'));
} else {
    $sql = "SELECT * FROM tbpessoa ORDER BY pesnome";
    $res = pg_query($condb, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Exercício 2 - Lista e Busca</title>
    <meta charset="utf-8">
</head>
<body>

<h2>Lista de Pessoas</h2>

<form method="get">
    Buscar por nome: 
    <input type="text" name="busca" value="<?=$busca ?>">
    <input type="submit" value="Buscar">
</form>
<br>

<?php if($busca!='') echo "<b>Buscando por:</b> $busca<br><br>"; ?>

<table border="1">
    <tr>
        <th>Cód</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>Estado</th>
    </tr>

<?php
while($p = pg_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>".$p['pescodigo']."</td>";
    echo "<td>".$p['pesnome']."</td>";
    echo "<td>".$p['pessobrenome']."</td>";
    echo "<td>".$p['pesemail']."</td>";
    echo "<td>".$p['pescidade']."</td>";
    echo "<td>".$p['pesestado']."</td>";
    echo "</tr>";
    }

?>
</table>
</body>
</html>

<?php pg_close($condb); ?>