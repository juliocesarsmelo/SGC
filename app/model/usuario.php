<?php
    class Usuario{

        // Connection
        private $connection;

        // Table
        private $db_table = "tab_usuario";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // CREATE - Criar registro
        public function registrarUsuario($nome, $cargo, $email, $senha){
            $sqlQuery = "INSERT INTO
                            ". $this->db_table ."
                        SET 
                            nome = :nome, 
                            cargo = :cargo, 
                            email = :email, 
                            senha = :senha";
        
            $stmt = $this->connection->prepare($sqlQuery);

            // bind data
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // GET ALL - Pegar todos os registros
        public function getAllUsuarios(){
            $sqlQuery = " SELECT * FROM ".$this->db_table." ORDER BY id_usuario ASC";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // GET single - Pegar registros únicos
        public function getUsuario($nome, $id){
            $sqlQuery = " SELECT * FROM ".$this->db_table." WHERE nome = ".$nome." OR id_usuario = ".$id;
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // LOGIN - Verificar E-MAIL e SENHA no banco
        public function loginUsuario($email, $senha){
            $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE nome = :email AND senha = :senha";

            $sqlQuery = $this->connection->prepare($sqlQuery);

            $sqlQuery->bindValue("email", $email);
            $sqlQuery->bindValue("senha", $senha);

            $sqlQuery->execute();

            // Validar se os dados existem
            if($sqlQuery->rowCount() > 0){
                $dado = $sqlQuery->fetch();
                if($email == $dado['email'] && $senha == $dado['senha']){
                    $_SESSION['id'] = $dado['id_usuario'];
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