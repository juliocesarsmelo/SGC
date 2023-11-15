<?php
    class StatusChamado{

        // Connection
        private $connection;

        // Table
        private $db_table = "tab_status_chamado";

        // Db connection
        public function __construct($db){
            $this->connection = $db;
        }

        // GET single - Pegar registros únicos
        public function getStatusChamado($valor){
            $sqlQuery = " SELECT * FROM ".$this->db_table." WHERE id_status = '%$valor%' ";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->execute();
            $dadosRetornados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dadosRetornados;
        }
    }
?>