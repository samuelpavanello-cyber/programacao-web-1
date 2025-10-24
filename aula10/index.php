<?php

    session_start();

    if (!isset($_SESSION["usuario"])){
        $_SESSION["usuario"] = "Visitante";
    }

    echo "Olá ". $_SESSION["usuario"]. "Vc esta logado";
    echo '<a href="sessaocontinua.php">Clique aqui pra continua</a>'; 






?>