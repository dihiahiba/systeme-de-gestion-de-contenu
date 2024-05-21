<?php

require_once('import/base.php');

class remarques{
    private $_id;
    private $_remarque;
    private $_id_article;
    private $_id_user;
    private $_db;
    

    public function setid($id)
    {
        $this->_id = $id;
    }
    public function setid_artice($_id_article)
    {
        $this->_id_article = $_id_article;
    }
    public function setremarque($remarque)
    {
        $this->_remarque = $remarque;
    }

    public function setAll($remarque,$_id_article,$id_user)
    {
        $this->_remarque = $remarque;
        $this->_id_article=$_id_article;
        $this->_id_user= $id_user;
        
    }

    

   
    
    public function getAll()
    {
        $_db = new database(); 
        $_db->query("select * from remarques");
        return $_db->result();
    }

    public function getOne()
    {
        $_db = new database(); 
        $_db->query("select * from remarques where id_article='" . $this->_id_article . "'  ORDER BY id DESC LIMIT 1");
        return $_db->one();
    }
    

    public function getuser()
    {
        $_db = new database(); 
        $_db->query("select * from users ");
        return $_db->result();
    }

    public function add()
    {
        $_db = new database();
        $_db->query("insert into remarques (remarque,id_article,id_user)
                    values ('"  . $this->_remarque . "', "  . $this->_id_article . ","  . $this->_id_user . ")" );
        $_db->execute();
        return 0;
    }

   
}