<?php

// Iniciando Sessão
session_start();

// Verificar se os dados não estão vazios, se estiverem , irá redirecionar para a tela_login.php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    // Incluindo arquivos
    include_once '../../config/database.php';
    include_once '../model/usuario.php';

    // Instanciando Novos Objetos 
    $database = new Database();
    $db = $database->getConnection();
    $usuario = new Usuario($db); 

    // Conexão com o Banco
    $database->getConnection();

    // Receber Dados do Formulário 
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    // Verificar login
    if($usuario->loginUsuario($email, $senha)){
        header("Location: ../../public/view/tela_principal.php"); 
    }else{
        session_unset(); // remove todas as variáveis de sessão
        session_destroy(); // destroi a sessão
        echo "<script>
        alert('Login falhou. Tente outra vez !!!');
        window.location.href='../../public/view/tela_login.php';
        </script>";
    }
}else{
    
    session_unset(); // remove todas as variáveis de sessão
    session_destroy(); // destroi a sessão
    echo "<script>
    alert('Login falhou. Tente outra vez !!!');
    window.location.href='../../public/view/tela_login.php';
    </script>";
}

