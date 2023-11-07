<?php
    class Usuario{

        private $nome;
        private $cargo;
        private $email;
        private $senha;

        // Connection
        private $connection;

        // Table
        private $db_table = "tab_usuario";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // LOGIN - Verificar E-MAIL e SENHA no banco
        public function Login($email, $senha){
            $sqlQuery = "SELECT * FROM ". $this->db_table ." WHERE nome = :email AND senha = :senha";

            $sqlQuery = $this->connection->prepare($sqlQuery);

            $sqlQuery->bindValue("email", $email);
            $sqlQuery->bindValue("senha", $senha);

            $sqlQuery->execute();

            // Validar se os dados existem
            if($sqlQuery->rowCount() > 0){
                $dado = $sqlQuery->fetch();
                if($email == $dado['email'] && $senha == $dado['senha']){
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
        public function createUsuario(){
            $sqlQuery = "INSERT INTO
                            ". $this->db_table ."
                        SET 
                            nome = :nome, 
                            cargo = :cargo, 
                            email = :email, 
                            senha = :senha";
        
            $stmt = $this->connection->prepare($sqlQuery);
        
            // sanitize
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->cargo=htmlspecialchars(strip_tags($this->cargo));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->senha=htmlspecialchars(strip_tags($this->senha));
        
            // bind data
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":cargo", $this->cargo);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>