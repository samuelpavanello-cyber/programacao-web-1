<?php

// Valor à vista e dados do financiamento
$valorAVista = 22500.00;
$parcelas = 60;
$valorParcela = 489.65;

/**
 * Calcula o valor total pago no financiamento
 * @param float $valorParcela
 * @param int $parcelas
 * @return float
 */
function calcularTotalFinanciamento($valorParcela, $parcelas) {
    return $valorParcela * $parcelas;
}

/**
 * Calcula o valor total dos juros pagos
 * @param float $valorTotal
 * @param float $valorAVista
 * @return float
 */
function calcularJuros($valorTotal, $valorAVista) {
    return $valorTotal - $valorAVista;
}

/**
 * Exibe o resultado formatado
 * @param float $valorAVista
 * @param float $valorTotal
 * @param float $valorJuros
 * @return void
 */
function escrever($valorAVista, $valorTotal, $valorJuros) {
    echo "Valor do carro à vista: R$ " . $valorAVista. "<br>";
    echo "Valor total pago no financiamento: R$ " .$valorTotal. "<br>";
    echo "<strong>Valor total pago só em juros: R$ " .$valorJuros. "</strong><br><br>";

    echo "<span style='color:red;'>Mariazinha pagou R$ " .$valorJuros . " a mais por financiar o carro.</span>";
}

// Programa principal
$valorTotal = calcularTotalFinanciamento($valorParcela, $parcelas);
$valorJuros = calcularJuros($valorTotal, $valorAVista);
escrever($valorAVista, $valorTotal, $valorJuros);

?>
