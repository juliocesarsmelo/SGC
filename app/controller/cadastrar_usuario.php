<?php
// Iniciando ou Resumindo Sessão
session_start();

// Verificar se os dados estão chegando via POST do formulário
if(isset($_POST['cadastrar_usuario'])){
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
    $nome = addslashes($_POST['nome']);
    $cargo = addslashes($_POST['cargo']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    // Registrar novo Usuario
    if($usuario->registrarUsuario($nome, $cargo, $email, $senha)){
        echo "<script>
                alert('Cadastro realizado com sucesso!!!');
                window.location.href='../public/tela_principal.php';
              </script>";
    }else{
        echo "<script>
                alert('Não foi possível finalizar o cadastro. Tente outra vez 01 !!!');
                window.location.href='../public/tela_cadastro_usuario.php';
              </script>";
    }
}else{
    echo "<script>
            alert('Não foi possível finalizar o cadastro. Tente outra vez 02 !!!');
            window.location.href='../public/tela_cadastro_usuario.php';
          </script>";
}

?>