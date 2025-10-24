<?php

$numero = 3.5;

    /**
     * Retorna se o número é par ou não
     * @param integer
     * @return boolean
     */
    function verificarPar($numero){
        return $numero % 2 == 0;
    }

    /**
     * Escreve se o número é par ou não
     * @param integer
     * @return void
     */
    function escreve($numero){
        if(verificarPar($numero)){
            echo "Número é par";
        } else {
            echo "Número é ímpar";
        }
    }

    echo escreve($numero);


?>