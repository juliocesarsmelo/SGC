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

        // LOGIN - Verificar NOME e SENHA no banco
        public function Login($nome, $senha){
            $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE nome = :nome AND senha = :senha";

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

        // CREATE - Criar registro
        public function createUsuarios(){
            $sqlQuery = "INSERT INTO
                            ". $this->db_table ."
                        SET 
                            nome = :nome, 
                            email = :email, 
                            senha = :senha";
        
            $stmt = $this->connection->prepare($sqlQuery);
        
            // sanitize
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->senha=htmlspecialchars(strip_tags($this->senha));
        
            // bind data
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>