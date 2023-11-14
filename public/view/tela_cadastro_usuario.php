<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC | Cadastrar Conta</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row ">
            <div class="col-6 mt-5 mb-5">
                <h1>Cadastrar Conta</h1>
                <hr>
            </div>
        </div>
        <form action="../../app/controller/cadastrar_usuario.php" method="POST">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="text" class="form-control" name="cargo" placeholder="Cargo" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="cadastrar_usuario">Cadastrar</button>
        </form>
        <div class="row justify-content-center">
            <div class="col mt-5">
                <hr>
                <span>Retornar para tela de </span> <a href="../view/tela_login.php">login</a><br>
            </div>
        </div>
    </div>   
</body>
</html>