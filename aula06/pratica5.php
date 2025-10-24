<?php

    $disciplina = [
        "estrutura de dados 2",
        "banco de dados", 
        "administração de sistemas (eu acho)",
        "Engenharia de Gorges", 
        "Programação WEB 1"
    ];

    $professores = [
        "Fernando Bastão",
        "Marco Aurelio Pinto",
        "Zézo (Não sei)",
        "Jullian",
        "Cleber Catarinão"
    ];

    for ($i = 0; $i < count($disciplina); $i++){
        echo "Disciplina: ". $disciplina[$i]. "  |  Professor: ". $professores[$i] ."<br>";
    }

?>