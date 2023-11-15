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

    if(!empty($_GET['search_chamado'])){
        $dadoPesquisa = $_GET['search_chamado'];
        $chamadosRetornados = $chamado->getChamadoTitulo($dadoPesquisa);
    }else{
        $chamadosRetornados = $chamado->getAllChamados($_SESSION['id']);
    }

    if(!empty($_GET['delete_chamado'])){
        $id_chamado = $_GET['delete_chamado'];
        if($chamado->deleteChamado($id_chamado)){
            echo "<script>
                    alert('Exlusão do software ocorreu com sucesso!!!');
                    window.location.href='./tela_principal.php';
                </script>";
        }
    }  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGC | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-11 mt-5 mb-4 d-flex justify-content-center">
                <h1>SISTEMA DE GERENCIAMENTO DE CHAMADO </h1>
            </div>
            <div class="col-1 mt-5 mb-4 d-flex align-items-center justify-content-end">
                <a href="../../app/controller/logout.php" class="btn btn-primary">Logout</a>
            </div>
            <hr>
        </div>
        <div class="row justify-content-center">
            <div class="col-2 mb-4">
                <a href="../view/tela_novo_chamado.php" class="btn btn-success">Novo chamado</a>
            </div>
            <div class="col-2 mb-4">
                <a class="btn btn-secondary">Meus chamados</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <h2>Chamados</h1>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" id="pesquisar_chamado" placeholder="Pesquisar título">
                    <div class="input-group-append">
                        <button onclick="searchData()" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Assunto</th>
                            <th scope="col">Cadastrado em</th>
                            <th scope="col">Gravidade</th>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Atendente</th>
                            <th scope="col">Status</th>
                            <th scope="col">[Excluir]</th>
                            <th scope="col">[Alterar]</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($chamadosRetornados as $valor){
                                echo "<tr>";
                                echo "<td>".$valor['id_chamado']."</td>";
                                echo "<td>".$valor['titulo']."</td>";
                                echo "<td>".$valor['assunto']."</td>";
                                echo "<td>".$valor['data_cadastro']."</td>";
                                echo "<td>".$valor['gravidade']."</td>";
                                echo "<td>".$valor['fk_usuario_solicitante']."</td>";
                                echo "<td>".$valor['fk_usuario_atendente']."</td>";
                                echo "<td>".$valor['fk_status']."</td>";
                                echo "<td><button id='delete_chamado' onclick=\"deleteChamado('". $valor['id_chamado'] ."');\" class='btn btn-danger'>X</button></td>";
                                echo "<td><button id='change_chamado' onclick=\"changeChamado('". $valor['id_chamado'] ."');\" class='btn btn-warning'>☼</button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    var search_chamado = document.getElementById('pesquisar_chamado');
    var delete_chamado = document.getElementById('delete_chamado');
    var change_chamado = document.getElementById('change_chamado');


    search_chamado.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    });

    delete_chamado.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            deleteChamado();
        }
    });

    change_chamado.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            changeChamado();
        }
    });

    function searchData(){
        window.location = 'tela_principal.php?search_chamado=' + pesquisar_chamado.value;
    }

    function deleteChamado(id_chamado){
        window.location = 'tela_principal.php?delete_chamado=' + id_chamado;
    }

    function changeChamado(id_chamado){
        window.location = 'tela_atualiza_chamado.php?change_chamado=' + id_chamado;
    }
</script>
</html>