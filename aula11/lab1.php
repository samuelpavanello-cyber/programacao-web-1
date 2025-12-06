<?php
define('DB_HOST', 'localhost');
define('DB_PORT', '5432');
define('DB_USER', 'postgres');
define('DB_PASS', '1711');
define('DB_NAME', 'aula11');

$connectionString = "host=".DB_HOST.
                    " port=".DB_PORT. 
                    " dbname=".DB_NAME.
                    " user=".DB_USER. 
                    " password=".DB_PASS;

$condb = pg_connect($connectionString);

if(!$condb){
    echo "Erro ao se conectar";
} else {
    // Echo "Deu boa pai <br>";


    // $result = pg_query($condb, "SELECT COUNT(*) AS QTDTABS FROM pg_tables");
    // while($row = pg_fetch_assoc($result)){
    //     // echo "numero de tabelas no banco é: ". $row['qtdtabs']. "<br>";

    // }

    //inserir

    // $aDados = [
    //     'Kaue',
    //     'Bugre',
    //     'kauebugre@gmail.com',
    //     '123123',
    //     'Itupobosta',
    //     'SC'
    // ];


    // $result = pg_query_params($condb,
    //                           "INSERT INTO tbpessoa (pesnome, pessobrenome, pesemail, pespassword, pescidade, pesestado)
    //                                 VALUES ($1, $2, $3, $4, $5, $6)",    
    //                           $aDados
    // );

    // if($result){
    //     // echo "Botado com sucesso";
    // }

}
?>