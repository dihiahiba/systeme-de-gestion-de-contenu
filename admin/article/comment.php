<?php

require_once('import/base.php');

class comments{
    private $_id_comment;
    private $_commentaire;
    private $_name;
    private $_email;
    private $_id;

    private $_db;

    public function setid($id)
    {
        $this->_id = $id;
    }
    public function getAll()
    {
        $_db = new database(); 
        $_db->query("SELECT `commentaire`.`id_comment`, `commentaire`,`name`,`email`,commentaire.date,title
        FROM `commentaire` INNER JOIN `articles` 
        ON `commentaire`.`id_comment` = `articles`.`id` ");
        return $_db->result();
    }
    
    public function getid()
    {
        $_db = new database(); 
        $_db->query("select id from commentaire where id_comment='" . $this->_id_comment . "' ");
        return $_db->result();
    }
    
    public function setAll($_commentaire,$name,$email,$id)
    {
       
        $this->_commentaire = $_commentaire;
        $this->_name= $name;
        $this->_email= $email;
        $this->_id = $id;
        

        
    }


    public function add()
    {
        $_db = new database();
        $_db->query("insert into commentaire (commentaire,name,email,id,date)
                    values ('"  . $this->_commentaire . "','"  . $this->_name . "','"  . $this->_email . "',"  . $this->_id . ",NOW())" );
        $_db->execute();
        return 0;
    }
}
