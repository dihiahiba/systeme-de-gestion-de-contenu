<?php

    class database {
        private $_host = "localhost";
        private $_user = "root";
        private $_password = "";
        private $_name = "pfs_cms";
        private $_statement;
        private $_handler;

        public function __construct() {
            $conn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_name;
            
            try {
                $this->_handler = new PDO($conn, $this->_user, $this->_password);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

 
        public function query($sql) {
            //echo $sql;
            $this->_statement = $this->_handler->prepare($sql);
        }

    
        public function execute() {
            return $this->_statement->execute();
        }

        public function one() {
            $this->execute();
            return $this->_statement->fetch(PDO::FETCH_OBJ);
        }
  
        public function result() {
            $this->execute();
            return $this->_statement->fetchAll(PDO::FETCH_OBJ);
        }

    }