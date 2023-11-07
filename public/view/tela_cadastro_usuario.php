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
        <div class="row justify-content-center">
            <div class="col-6 mt-5 mb-5">
                <h1>Cadastrar Conta</h1>
                <hr>
            </div>
        </div>
        <form action="../app/validação_cadastro.php" method="POST">
            <div class="row justify-content-center">
                <div class="col-3">
                    <div class="form-group mb-4">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-4">s
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mb-4">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control">
                    </div>
                </div>
            </div>  
            <div class="row justify-content-center">
                <div class="col-6">
                <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button><br><br><br><br>
                </div>
            </div> 
        </form>
    </div>   
</body>
</html>