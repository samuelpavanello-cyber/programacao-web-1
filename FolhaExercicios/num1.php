<?php

$num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
$num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
$num3 = isset($_POST['num3']) ? $_POST['num3'] : 0;

var_dump($num1);
function defineCor($num1, $num2, $num3){
    if($num1 > 10){
        $cor = 'blue';
    } else if($num2 < $num3){
        $cor = 'green';
    } else if($num3 < $num2 && $num3 < $num1){
        $cor = 'red';
    } else {
        $cor = 'black';
    }

    return $cor;
}

function somaValores($num1, $num2, $num3): mixed{
    return $num1 + $num2 + $num3;
}

function escreve($num1, $num2, $num3){
    $iSoma = somaValores($num1, $num2, $num3);
    $sCor = defineCor($num1, $num2, $num3);

    echo "<h3 style='color:$sCor'>O Resultado da soma é de: $iSoma </h3>";
}



// Echo escreve($num1, $num2, $num3);






?>
