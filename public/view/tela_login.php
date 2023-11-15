<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC | Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 mt-5 mb-4">
                <h1>SISTEMA DE GERENCIAMENTO DE CHAMADOS - SGC</h1>
                <hr>
            </div>
        </div>
        <form action="../../app/controller/logar.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="form-group mb-2">
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <hr>
                <span>Ainda não possui cadastro, </span> <a href="../view/tela_cadastro_usuario.php">cadastre-se</a><br>
            </div>
        </div>
    </div>
    
</body>
    <script src="../public/javascript/main.js"></script>
</html>