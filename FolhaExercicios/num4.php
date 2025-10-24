<?php

$iBase = 6;
$iAltura = 2;

/**
 * Calcula Área do Retangulo
 * @param integer $iBase
 * @param integer $iAltura
 * @return integer
 */
function calculaArea($iBase, $iAltura){
    return $iBase * $iAltura;
}

/**
 * Escreve área do retangulo
 * @param integer $iBase
 * @param integer $iAltura
 * @return void
 */
function escreve($iBase, $iAltura){
    $iArea = calculaArea($iBase, $iAltura);
    $sTag = $iArea > 10 ? "1" : "3";
  
    Echo "<h$sTag>A área do retânhulo de lados $iBase e $iAltura é ". calculaArea($iBase, $iAltura). " metros quadrados </h$sTag>";
}

escreve($iBase, $iAltura);
?>