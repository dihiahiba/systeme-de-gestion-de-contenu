<?php

class database2 {
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
class user{
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
        $_db = new database2(); 
        $_db->query("select * from users where nom like '%" . $this->_nom . "%'");
        return $_db->one();
    }
    
    public function getAll()
    {
        $_db = new database2(); 
        $_db->query("select * from users where isActive='yes'");
        return $_db->result();
    }
    public function getUserArchive(){
        $_db = new database2(); 
        $_db->query("select * from users where isActive='no'");
        return $_db->result();
    }
    public function getOne()
    {
        $_db = new database2(); //instanciation
        $_db->query("select * from users where id=" . $this->_id . "");
        return $_db->one();
    }

    public function add()
    {
        $_db = new database2();
        $_db->query("insert into users (nom,prenom,username,password,isAdmin,regdate)
                    values ('"  . $this->_nom . "','"  . $this->_prenom . "','"  . $this->_username . "','"  . $this->_password . "','"  . $this->_isAdmin . "',NOW())" );
        $_db->execute();
        return 0;
    }

    public function update()
    {
        $_db = new database2(); 
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
        $_db = new database2(); 
        $_db->query("update users set isActive='no' where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }
    public function user_active()
    {
        $_db = new database2(); 
        $_db->query("update users set isActive='yes' where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }

    public function delete()
    {
        $_db= new database2();
        $_db->query("delete from users where id=" . $this->_id . "");
        $_db->execute();
        return 0;
    }
}