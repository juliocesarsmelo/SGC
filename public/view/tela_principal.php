<?php
    // Iniciando sessão ou resumindo sessão existe
    session_start();

    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true)){
        session_unset();
        echo "<script>
                alert('Está página só pode ser acessa por usuário logado');
                window.location.href='../view/tela_login.php';
                </script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | SGC</title>
</head>
<body>
    
</body>
</html>