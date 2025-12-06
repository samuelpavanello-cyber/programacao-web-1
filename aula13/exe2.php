<?php
require_once 'class.pessoa.php';
require_once 'class.contato.php';
require_once 'class.endereco.php';

$pai = new Pessoa();
$pai->setNome("João");
$pai->setSobrenome("Silva");
$pai->setDataNascimento("1978-03-20");

$mae = new Pessoa();
$mae->setNome("Maria");
$mae->setSobrenome("Silva");
$mae->setDataNascimento("1980-11-15");

$irmao = new Pessoa();
$irmao->setNome("Pedro");
$irmao->setSobrenome("Silva");
$irmao->setDataNascimento("2005-07-10");

$eu = new Pessoa();
$eu->setNome("Kaue");
$eu->setSobrenome("Borge");
$eu->setDataNascimento("2000-05-15");


$familia = [
    $pai,
    $mae,
    $irmao,
    $eu
];

$texto = "";
foreach($familia as $p){
    $texto .= $p->getNomeCompleto() . " - " . $p->getIdade() . " anos\n";
}

file_put_contents('familia.txt', $texto);

echo "SALVO";
?>