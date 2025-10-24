<?php
session_start();

if(isset($_SESSION["usuario"])){
    echo "Sessao iniciada, usuário : ". $_SESSION["usuario"]. "<br>";
} else{
    echo "VOce nao ta logado";
    echo '<a href="index.php">Volte aqui para logar</a>';
}