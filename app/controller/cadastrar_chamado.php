<?php
// Iniciando ou Resumindo Sessão
session_start();

// Verificar se os dados estão chegando via POST do formulário
if(isset($_POST['cadastrar_chamado'])){
    // Incluindo arquivos
    include_once '../../config/database.php';
    include_once '../model/usuario.php';

    // Instanciando Novos Objetos 
    $database = new Database();
    $db = $database->getConnection();

    $chamado = new Chamado($db); 

    // Conexão com o Banco
    $database->getConnection();

    // Receber Dados do Formulário 
    $titulo = addslashes($_POST['titulo']);
    $assunto = addslashes($_POST['assunto']);
    $data_cadastro = addslashes($_POST['data_cadastro']);
    $gravidade = addslashes($_POST['gravidade']);
    $id_usuario_solicitante = addslashes($_POST['id_usuario_solicitante']);
    $id_usuario_atendente = addslashes($_POST['id_usuario_atendente']);
    $id_status = addslashes($_POST['id_status']);

    // Registrar novo Usuario
    if($usuario->registrarChamado($titulo, $assunto, $data_cadastro, $gravidade, $id_usuario_solicitante, $id_usuario_atendente, $id_status)){
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