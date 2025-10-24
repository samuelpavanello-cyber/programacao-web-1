<?php

$iBase = 6;
$iAltura = 2;

/**
 * Calcula Área do triângulo retângulo
 * @param integer $iBase
 * @param integer $iAltura
 * @return integer
 */
function calculaArea($iBase, $iAltura){
    return ($iBase * $iAltura) / 2;
}

/**
 * Escreve a Área do triângulo retângulo
 * @param integer $iBase
 * @param integer $iAltura
 * @return void
 */
function escreve($iBase, $iAltura){
    Echo "A área do triângulo retângulo é: ". calculaArea($iBase, $iAltura);
}

escreve($iBase, $iAltura);
?>