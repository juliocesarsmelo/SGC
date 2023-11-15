<?php
    class Chamado{

        // Connection
        private $connection;

        // Table
        private $db_table = "tab_chamado";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // CREATE - Criar registro
        public function registrarChamado($titulo, $assunto, $data_cadastro, $gravidade, $fk_usuario_solicitante, $fk_usuario_atendente, $fk_status){
            $sqlQuery = "INSERT INTO
                            ". $this->db_table ."
                        SET 
                            titulo = :titulo, 
                            assunto = :assunto, 
                            data_cadastro = :data_cadastro, 
                            gravidade = :gravidade, 
                            fk_usuario_solicitante = :fk_usuario_solicitante, 
                            fk_usuario_atendente = :fk_usuario_atendente,
                            fk_status = :fk_status";
        
            $stmt = $this->connection->prepare($sqlQuery);

            // bind data
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":assunto", $assunto);
            $stmt->bindParam(":data_cadastro", $data_cadastro);
            $stmt->bindParam(":gravidade", $gravidade);
            $stmt->bindParam(":fk_usuario_solicitante", $fk_usuario_solicitante);
            $stmt->bindParam(":fk_usuario_atendente", $fk_usuario_atendente);
            $stmt->bindParam(":fk_status", $fk_status);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // GET ALL - Pegar todos os registros
        public function getAllChamados($valor = null){
            $sqlQuery = " SELECT * FROM ".$this->db_table." WHERE fk_usuario_solicitante = ".$valor." OR fk_usuario_atendente = ".$valor;
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // GET single - Pegar registros únicos pelo TITULO
        public function getChamadoTitulo($valor){
            $sqlQuery = " SELECT * FROM ".$this->db_table." WHERE titulo LIKE '%$valor%' ";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // GET single - Pegar registros únicos pelo ID
        public function getChamadoId($id){
            $sqlQuery = " SELECT * FROM ".$this->db_table." WHERE id_chamado = ".$id;
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // DELETE - deletar um registro
        public function deleteChamado($valor){
            $sqlQuery = "DELETE FROM ".$this->db_table." WHERE id_chamado = '$valor'";            
            $stmt = $this->connection->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }
            return false;
        }

         // UPDATE - alterar um registro
         public function updateChamado($id_chamado, $titulo, $assunto, $gravidade, $fk_usuario_atendente, $fk_status){
            $sqlQuery = " UPDATE ".$this->db_table." SET titulo = '".$titulo."' ,assunto = '".$assunto."' ,gravidade = ".$gravidade." ,fk_usuario_atendente = ".$fk_usuario_atendente." ,fk_status = ".$fk_status. " WHERE id_chamado = ".$id_chamado; 
            $stmt = $this->connection->prepare($sqlQuery);
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>