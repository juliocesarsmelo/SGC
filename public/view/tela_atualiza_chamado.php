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

    include_once '../../config/database.php';
    include_once '../../app/model/usuario.php';
    include_once '../../app/model/chamado.php';
    include_once '../../app/model/status_chamado.php';

    $database = new Database();
    $db = $database->getConnection();

    $usuario = new Usuario($db);
    $chamado = new Chamado($db); 
    $status_chamado = new StatusChamado($db); 

    $chamadoRetornado = $chamado->getChamadoId($_GET['change_chamado']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC | Atualizar Chamado</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="row ">
            <div class="col-6 mt-4 mb-5">
                <h1>Atualizar Chamado #<?php echo $_GET['change_chamado']?></h1>
                <hr>
            </div>
        </div>
        <form action="../../app/controller/alterar_chamado.php" method="POST">
        <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="id_chamado" value="<?php echo $_GET['change_chamado']; ?>" placeholder="Id Chamado" hidden>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="titulo" value="<?php echo $chamadoRetornado[0]['titulo']; ?>" placeholder="Título" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="assunto" value="<?php echo $chamadoRetornado[0]['assunto']; ?>" placeholder="Assunto" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="gravidade" value="<?php echo $chamadoRetornado[0]['gravidade']; ?>" placeholder="Gravidade (1-Alta 2-Média 3-Baixa)" maxlength="1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="fk_usuario_atendente" value="<?php echo $chamadoRetornado[0]['fk_usuario_atendente']; ?>" placeholder="Atendente" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="fk_status" value="<?php echo $chamadoRetornado[0]['fk_status']; ?>" placeholder="Status" required>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="alterar_chamado">Atualizar</button>
        </form>
        <div class="row justify-content-center">
            <div class="col mt-3">
                <hr>
                <span>Retornar para </span> <a href="../view/tela_principal.php">Tela Principal</a><br><br><br><br>
            </div>
        </div>
    </div>   
</body>
</html>