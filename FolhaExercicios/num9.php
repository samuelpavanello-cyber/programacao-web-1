<?php


$valorAVista = 8654.00;


$opcoes = [
    ["parcelas" => 24, "juros" => 2.0],
    ["parcelas" => 36, "juros" => 2.3],
    ["parcelas" => 48, "juros" => 2.6],
    ["parcelas" => 60, "juros" => 2.9]
];

/**
 * Calcula o valor total com juros compostos
 * @param float $capital 
 * @param float $taxa 
 * @param int $tempo
 * @return float 
 */
function calcularJurosCompostos($capital, $taxa, $tempo) {
    $taxaDecimal = $taxa / 100;
    return $capital * pow((1 + $taxaDecimal), $tempo);
}

/**
 * Escreve os valores do parcelamento
 * @param float $valorAVista
 * @param array $opcoes
 * @return void
 */
function escreve($valorAVista, $opcoes) {
    echo "Valor à vista da moto: R$ " . round($valorAVista, 2) . "<br><br>";

    foreach ($opcoes as $opcao) {
        $parcelas = $opcao["parcelas"];
        $juros = $opcao["juros"];
        $valorTotal = calcularJurosCompostos($valorAVista, $juros, $parcelas);
        $valorParcela = $valorTotal / $parcelas;

        echo "$parcelas vezes com juros de $juros% ao mês:<br>";
        echo "- Valor total: R$ " . round($valorTotal, 2) . "<br>";
        echo "- Valor da parcela: R$ " . round($valorParcela, 2) . "<br><br>";
    }
}

escreve($valorAVista, $opcoes);

?>
