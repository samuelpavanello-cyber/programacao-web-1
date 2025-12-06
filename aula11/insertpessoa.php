<?php
require_once('lab1.php');

$sNome      = isset($_POST['nome'])      ? $_POST['nome']      : "";
$sSobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "";
$sEmail     = isset($_POST['email'])     ? $_POST['email']     : "";
$sSenha     = isset($_POST['senha'])     ? $_POST['senha']     : "";
$sCidade    = isset($_POST['cidade'])    ? $_POST['cidade']    : "";
$sEstado    = isset($_POST['estado'])    ? $_POST['estado']    : "";

$aDados = [
    $sNome     ,
    $sSobrenome,
    $sEmail    ,    
    $sSenha    ,
    $sCidade   ,
    $sEstado
];


$result = pg_query_params($condb,
"INSERT INTO tbpessoa (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado)
      VALUES ($1, $2, $3, $4, $5, $6)",    
$aDados
);


?>