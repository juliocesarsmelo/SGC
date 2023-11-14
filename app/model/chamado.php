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
        public function registrarChamado($titulo, $assunto, $data_cadastro, $gravidade, $fk_usuario_solicitante, $fk_usuario_atendente, $fk_status){
            $sqlQuery = "INSERT INTO
                            ". $this->dbTable ."
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
        public function getAllChamados($id = null){
            $sqlQuery = " SELECT * FROM ".$this->dbTable." WHERE fk_usuario_solicitante = ".$id." OR fk_usuario_atendente = ".$id;
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