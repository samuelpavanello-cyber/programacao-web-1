<?php

$aPastas = array(
    "bsn" => array(
        "3a Fase" => array("desenvWeb", "bancoDados 1", "engSoft 1"),
        "4a Fase" => array("Intro Web", "bancoDados 2", "engSoft 2")
    )
);

/**
 * Mostra a árvore
 * @param array $array
 * @param integer $iNivel
 * @return void
 */
function mostrar($array, $iNivel = 1){
    foreach($array as $chave => $valor){
        echo str_repeat("-", $iNivel) . " " . $chave . "<br>";
        if(is_array($valor)){
            mostrar($valor, $iNivel + 1);
        }
    }
}

mostrar($pastas);

?>
