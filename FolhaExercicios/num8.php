<?php


$valorAVista = 8654;

$opcoes = [
    ["parcelas" => 24, "juros" => 1.5],
    ["parcelas" => 36, "juros" => 2.0],
    ["parcelas" => 48, "juros" => 2.5],
    ["parcelas" => 60, "juros" => 3.0]
];

/**
 * Calcula o valor total com juros simples
 * @param float $capital
 * @param float $taxa 
 * @param int $tempo 
 * @return float 
 */
function calcularJurosSimples($capital, $taxa, $tempo) {
    $taxaDecimal = $taxa / 100;
    return $capital * (1 + $taxaDecimal * $tempo);
}

/**
 * Escreve os valores dos parcelamentos
 * @param float $valorAVista
 * @param array $opcoes
 * @return void
 */
function escreve($valorAVista, $opcoes) {
    echo "Valor à vista da moto: R$ " . $valorAVista . "<br><br>";

    foreach ($opcoes as $opcao) {
        $parcelas = $opcao["parcelas"];
        $juros = $opcao["juros"];
        $valorTotal = calcularJurosSimples($valorAVista, $juros, $parcelas);
        $valorParcela = $valorTotal / $parcelas;

        echo "<strong>$parcelas vezes</strong> com juros de $juros% ao mês:<br>";
        echo "- Valor total: R$ " . $valorTotal . "<br>";
        echo "- Valor da parcela: R$ " . round($valorParcela, 2) . "<br><br>";
    }
}

escreve($valorAVista, $opcoes);

?>
