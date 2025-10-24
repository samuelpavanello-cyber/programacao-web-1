<?php

$salario1 = 1000;
$salario2 = 2000;

// $salario2 = $salario1;
// $salario2++;

$salario1 *= 1.1;

echo "Salario 1: " . $salario1 . " | Salário 2: " . $salario2;
echo "<hr>";

if ($salario1 > $salario2) {
    echo "o Valor da variavel 1 é maior que o valor da variavel 2";
} elseif ($salario1 < $salario2) {
    echo "O valor da variavel 1 é menor que o valor da variavel 2";
} else {
    echo "Os valores iguais";
}

echo "<hr>";

$nomes = array("kauegorges","deividtrilhos","tadeu","golherme","jarbas","pablo");

foreach($nomes as $nom) {
    echo "$nom <br>";
}

echo "<hr>";

for ($i = 0; $i <= 100; $i++){
    $salario1++;

    if($i == 50){
        break;
    }
}

if($salario1 < $salario2){
    echo "<h1>$salario1</h2>";
}