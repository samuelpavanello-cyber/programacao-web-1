<?php


$valorDisponivel = 50;

// Produtos e preços por kg
$aProdutos = [
    "Maçã"      => ["precoKg" => 6.50, "quantidade" => 4],
    "Melancia"  => ["precoKg" => 3.00, "quantidade" => 4],
    "Laranja"   => ["precoKg" => 5.00, "quantidade" => 1.5],
    "Repolho"   => ["precoKg" => 4.00, "quantidade" => 1],
    "Cenoura"   => ["precoKg" => 3.50, "quantidade" => 1],
    "Batatinha" => ["precoKg" => 4.50, "quantidade" => 2]
];

/**
 * Calcula o valor total da compra
 * @param array $aProdutos
 * @return float
 */
function calcularTotal($aProdutos) {
    $total = 0;
    foreach ($aProdutos as $produto => $dados) {
        $total += $dados["precoKg"] * $dados["quantidade"];
    }
    return $total;
}

/**
 * Exibe o resultado com cores e mensagens conforme o saldo
 * @param float $total
 * @param float $valorDisponivel
 * @return void
 */
function escrever($total, $valorDisponivel) {
    echo "Valor total da compra: R$ " .$total. "<br>";

    if ($total > $valorDisponivel) {
        $faltou = $total - $valorDisponivel;
        echo "<span style='color:red;'>O dinheiro não foi suficiente! Faltaram R$ " .$faltou . ".</span>";
    } elseif ($total < $valorDisponivel) {
        $sobrou = $valorDisponivel - $total;
        echo "<span style='color:blue;'>Joãozinho ainda pode gastar R$ " . $sobrou. ".</span>";
    } else {
        echo "<span style='color:green;'>O saldo para compras foi esgotado exatamente! Joãozinho usou todo o dinheiro.</span>";
    }
}

/**
 * Exibe os valores individuais de cada produto
 * @param array $aProdutos
 * @return void
 */
function escreverCompra($aProdutos) {
    echo "<h3>Detalhamento da compra:</h3>";
    foreach ($aProdutos as $nome => $dados) {
        $valorProduto = $dados["precoKg"] * $dados["quantidade"];
        echo $nome . ": " . $dados["quantidade"] . " kg x R$ " .$dados["precoKg"]. 
             " = R$ " . $valorProduto. "<br>";
    }
}

// Programa principal
$totalCompra = calcularTotal($aProdutos);
escreverCompra($aProdutos);
echo "<hr>";
escrever($totalCompra, $valorDisponivel);

?>
