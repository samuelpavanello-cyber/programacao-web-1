<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otário</title>
</head>
<body>
    <?php
        if(!isset($_SESSION["usuario"])){
            $_SESSION["usuario"] = $_POST['usuario'];
            $_SESSION["senha"] = $_POST['senha'];
            $_SESSION["inicio_sessao"] = date("d/m/Y H:i:s");
            $_SESSION['inicio'] = time();

        }

        echo "Usuário ". $_SESSION["usuario"]. "<br>"; 
        echo "Senha ". $_SESSION["senha"]. "<br>"; 
        echo "Data/Hora ". $_SESSION["inicio_sessao"]. "<br>"; 
        echo "REquisicao :". (strtotime(($_SESSION['ultima_requisicao']) - strtotime($_SESSION['inicio'])));

        echo '<a href="logout.php"> Encerrar Sessão </a>';
    ?>
</body>
</html>