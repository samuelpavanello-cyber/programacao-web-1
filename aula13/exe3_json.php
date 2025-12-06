<?php
require_once 'class.pessoa.php';
require_once 'class.contato.php';
require_once 'class.endereco.php';

$pai = new Pessoa();
$pai->setNome("João"); $pai->setSobrenome("Silva"); $pai->setDataNascimento("1978-03-20");

$mae = new Pessoa();
$mae->setNome("Maria"); $mae->setSobrenome("Silva"); $mae->setDataNascimento("1980-11-15");

$eu = new Pessoa();
$eu->setNome("Kaue"); $eu->setSobrenome("Bugre"); $eu->setDataNascimento("2000-05-15");

$tel = new Contato();
$tel->setTipo(1); $tel->setNome("Celular"); $tel->setValor("49 99999-9999");
$eu->setTelefone($tel);

$end = new Endereco();
$end->setLogradouro("Rua Teste");
$end->setBairro("Centro");
$end->setCidade("Ituporanga");
$end->setEstado("SC");
$end->setCep("88400-000");
$eu->setEndereco($end);

$familia = [$pai, $mae, $eu];

foreach($familia as $i => $pessoa){
    file_put_contents("pessoa_$i.json", $pessoa->toJson());
}

echo "Tudo salvo em jaison!";
?>