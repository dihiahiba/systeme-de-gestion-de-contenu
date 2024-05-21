
<?php

require_once('./import/base.php');

class categories{
    private $_id;
    private $_name;
    private $_db;
    

    public function setid($id)
    {
        $this->_id = $id;
    }
    public function setname($name)
    {
        $this->_name = $name;
    }

    public function setAll($id,$name)
    {
        $this->_id = $id;
        $this->_name = $name;
        
    }

    public function count(){
        $_db= new database();
        $_db->query("SELECT COUNT(*) FROM categories");
        return $_db->result();
    }

    public function search()
    {
        $_db = new database(); 
        $_db->query("select * from categories where name like '%" . $this->_name . "%'");
        return $_db->one();
    }
    
    public function getAll()
    {
        $_db = new database(); 
        $_db->query("select * from categories");
        return $_db->result();
    }

    public function getOne()
    {
        $_db = new database(); 
        $_db->query("select * from categories where id='" . $this->_id . "'");
        return $_db->one();
    }
    public function getname()
    {
        $_db = new database(); 
        $_db->query("select * from categories where name='" . $this->_name . "'");
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
        $_db->query("insert into categories (name)
                    values ('"  . $this->_name . "')" );
        $_db->execute();
        return 0;
    }

    public function delete()
    {
        $_db= new database();
        $_db->query("delete from categories where id=" . $this->_id . "");
        $_db->execute();
        return 0;
    }

    
    public function update()
    {
        $_db = new database(); 
        $_db->query("update categories set id = " . $this->_id . ", name= '" . $this->_name . "'
                    where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    } 
}

