<?php

require_once('import/base.php');

class users{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_username;
    private $_password;
    private $_isAdmin;
    private $_regdate;

    
    
    private $_db;

    public function setadmin($isAdmin)
    {
        $this->_isAdmin = $isAdmin;
    }
    public function setid($id)
    {
        $this->_id = $id;
    }

    public function setAll($nom,$prenom,$username,$password,$isAdmin)
    {
       
        $this->_nom = $nom;
        $this->_prenom= $prenom;
        $this->_username = $username;
        $this->_password = $password;
        
        $this->_isAdmin = $isAdmin;

        
    }
    public function kolchi($id,$nom,$prenom,$username,$isAdmin)
    {
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom= $prenom;
        $this->_username = $username;
        $this->_isAdmin = $isAdmin;

        
    }
    
    public function search()
    {
        $_db = new database(); 
        $_db->query("select * from users where nom like '%" . $this->_nom . "%'");
        return $_db->one();
    }
    
    public function getAll()
    {
        $_db = new database(); 
        $_db->query("select * from users where isActive='yes'");
        return $_db->result();
    }
    public function getUserArchive(){
        $_db = new database(); 
        $_db->query("select * from users where isActive='no'");
        return $_db->result();
    }
    public function getOne()
    {
        $_db = new database(); //instanciation
        $_db->query("select * from users where id=" . $this->_id . "");
        return $_db->one();
    }

    public function add()
    {
        $_db = new database();
        $_db->query("insert into users (nom,prenom,username,password,isAdmin,regdate)
                    values ('"  . $this->_nom . "','"  . $this->_prenom . "','"  . $this->_username . "','"  . $this->_password . "','"  . $this->_isAdmin . "',NOW())" );
        $_db->execute();
        return 0;
    }

    public function update()
    {
        $_db = new database(); 
        $_db->query("update users set id = " . $this->_id . ",
                                                    nom= '" . $this->_nom . "',
                                                    prenom= '"  . $this->_prenom . "',
                                                    username= '"  . $this->_username . "',

                                                    isAdmin= '"  . $this->_isAdmin . "'
                                                    
                                                    where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }
    public function user_desactive()
    {
        $_db = new database(); 
        $_db->query("update users set isActive='no' where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }
    public function user_active()
    {
        $_db = new database(); 
        $_db->query("update users set isActive='yes' where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }

    public function delete()
    {
        $_db= new database();
        $_db->query("delete from users where id=" . $this->_id . "");
        $_db->execute();
        return 0;
    }
}