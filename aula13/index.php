<?php
require_once 'class.contato.php';
require_once 'class.endereco.php';
require_once 'class.pessoa.php';

$eu = new Pessoa();
$eu->setNome("Kaue");
$eu->setSobrenome("Borge");
$eu->setDataNascimento("2000-05-15");
$eu->setCpfcnpj("123.456.789-00");
$eu->setTipo(1);

$tel = new Contato();
$tel->setTipo(1);
$tel->setNome("Celular");
$tel->setValor("49 99999-9999");
$eu->setTelefone($tel);

$end = new Endereco();
$end->setLogradouro("Rua das Flores");
$end->setBairro("Centro");
$end->setCidade("Ituporanga");
$end->setEstado("SC");
$end->setCep("88400-000");
$eu->setEndereco($end);

echo $eu->getNomeCompleto() . "<br>";
echo "Idade: " . $eu->getIdade() . "<br>";
echo "Tel: " . $eu->getTelefone()->getValor() . "<br>";
echo "Cidade: " . $eu->getEndereco()->getCidade() . "/" . $eu->getEndereco()->getEstado();
?>