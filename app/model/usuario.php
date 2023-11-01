<?php
    class Usuario{

        // Connection
        private $connection;

        // Table
        private $dbTable = "tab_usuario";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // LOGIN - Verificar NOME e SENHA no banco
        public function Login($nome, $senha){
            $sqlQuery = "SELECT * FROM ". $this->dbTable ." WHERE nome = :nome AND senha = :senha";

            $sqlQuery = $this->connection->prepare($sqlQuery);

            $sqlQuery->bindValue("nome", $nome);
            $sqlQuery->bindValue("senha", $senha);

            $sqlQuery->execute();

            // Validar se os dados existem
            if($sqlQuery->rowCount() > 0){
                $dado = $sqlQuery->fetch();
                if($nome == $dado['nome'] && $senha == $dado['senha']){
                    $_SESSION['id'] = $dado['id'];
                    $_SESSION['nome'] = $dado['nome'];
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }    
    }
?>