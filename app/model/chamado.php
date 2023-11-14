<?php
    class Chamado{

        // Connection
        private $connection;

        // Table
        private $dbTable = "tab_chamado";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // CREATE - Criar registro
        public function registrarChamado($titulo, $assunto, $data_cadastro, $gravidade, $id_usuario_solicitante, $id_usuario_atendente, $id_status){
            $sqlQuery = "INSERT INTO
                            ". $this->dbTable ."
                        SET 
                            titulo = :titulo, 
                            assunto = :assunto, 
                            data_cadastro = :data_cadastro, 
                            gravidade = :gravidade, 
                            id_usuario_solicitante = :id_usuario_solicitante, 
                            id_usuario_atendente = :id_usuario_atendente,
                            id_status = :id_status";
        
            $stmt = $this->connection->prepare($sqlQuery);

            // bind data
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":assunto", $assunto);
            $stmt->bindParam(":data_cadastro", $data_cadastro);
            $stmt->bindParam(":gravidade", $gravidade);
            $stmt->bindParam(":id_usuario_solicitante", $id_usuario_solicitante);
            $stmt->bindParam(":id_usuario_atendente", $id_usuario_atendente);
            $stmt->bindParam(":id_status", $id_status);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // GET ALL - Pegar todos os registros
        public function getAllChamados($id = null){
            $sqlQuery = " SELECT * FROM ".$this->dbTable." WHERE id_usuario_solicitante = ".$id." OR id_usuario_atendente = ".$id;
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }

        // GET single - Pegar registros únicos
        public function getChamado($valor){
            $sqlQuery = " SELECT * FROM ".$this->dbTable." WHERE titulo LIKE '%$valor%' ";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }
    }
?>