<?php

$arquivo = 'pessoas.json';

if(file_exists($arquivo)) {
    $pessoas = json_decode(file_get_contents($arquivo), true);
} else {
    $pessoas = [];
}

if($_POST) {
    $pessoa = [
        'nome'      => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'] ?? '',
        'email'     => $_POST['email'],
        'cidade'    => $_POST['cidade'] ?? '',
        'estado'    => $_POST['estado'] ?? ''
    ];
    
    $pessoas[] = $pessoa;             
    file_put_contents($arquivo, json_encode($pessoas, JSON_PRETTY_PRINT));
    echo "<b>Pessoa salva!</b><br><br>";
}
?>

<h2>Cadastro no Arquivo JSON</h2>

<form method="post">
    Nome: <input type="text" name="nome" required><br><br>
    Sobrenome: <input type="text" name="sobrenome"><br><br>
    Email: <input type="text" name="email" required><br><br>
    Cidade: <input type="text" name="cidade"><br><br>
    Estado: <input type="text" name="estado" maxlength="2"><br><br>
    <input type="submit" value="Gravar no JSON">
</form>
