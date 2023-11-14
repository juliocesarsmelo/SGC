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
    <title>SGC | Novo Chamado</title>
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
                <h1>Cadastrar Chamado</h1>
                <hr>
            </div>
        </div>
        <form action="../../app/controller/cadastrar_chamado.php" method="POST">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="titulo" placeholder="Título" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="assunto" placeholder="Assunto" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="date" class="form-control" name="data_cadastro" placeholder="Data Cadastro" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="gravidade" placeholder="Gravidade (1-Alta 2-Média 3-Baixa)" maxlength="1" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="fk_usuario_solicitante" value="<?php echo $_SESSION['id'] ?>" hidden>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="fk_usuario_atendente" placeholder="Atendente" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="fk_status" placeholder="Status" required>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="cadastrar_chamado">Cadastrar</button>
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