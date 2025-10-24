<?php

$iLado = 3;

/**
 * Calcula Área do Quadrado
 * @param integer $iLado
 * @return integer
 */
function calculaArea($iLado){
    return $iLado * $iLado;
}

/**
 * Escreve área do quadrado
 * @param integer $iLado
 * @return void
 */
function escreve($iLado){
    Echo "A área do quadrado de lado $iLado metros é ". calculaArea($iLado). " metros quadrados";
}

escreve($iLado);
?>