<?php
// Iniciando ou Resumindo Sessão
session_start();

// Verificar se os dados estão chegando via POST do formulário
if(isset($_POST['alterar_chamado'])){
    // Incluindo arquivos
    include_once '../../config/database.php';
    include_once '../model/usuario.php';
    include_once '../model/chamado.php';


    // Instanciando Novos Objetos 
    $database = new Database();
    $db = $database->getConnection();

    // Conexão com o Banco
    $database->getConnection();

    $chamado = new Chamado($db); 

    // Receber Dados do Formulário 
    $id_chamado = addslashes($_POST['id_chamado']);
    $titulo = addslashes($_POST['titulo']);
    $assunto = addslashes($_POST['assunto']);
    $gravidade = addslashes($_POST['gravidade']);
    $fk_usuario_atendente = addslashes($_POST['fk_usuario_atendente']);
    $fk_status = addslashes($_POST['fk_status']);

    // Registrar novo Usuario
    if($chamado->updateChamado($id_chamado, $titulo, $assunto, $gravidade, $fk_usuario_atendente, $fk_status)){
        echo "<script>
                alert('Update realizado com sucesso!!!');
                window.location.href='../../public/view/tela_principal.php';
              </script>";
    }else{
        echo "<script>
                alert('Não foi possível finalizar o update. Tente outra vez 01 !!!');
                window.location.href='../../public/view/tela_principal.php';
              </script>";
    }
}else{
    echo "<script>
            alert('Não foi possível finalizar o update. Tente outra vez 02 !!!');
            window.location.href='../../public/view/tela_principal.php';
          </script>";
}

?>