<?php

require_once('import/base.php');

class articles{
    private $_id;
    private $_title;
    private $_image;
    private $_content;
    private $_categorie;
    private $_id_user;
    private $_isValidate;

    
    
    private $_db;

    public function settitle($title)
    {
        $this->_title = $title;
    }
    public function setid($id)
    {
        $this->_id = $id;
    }
    public function setUserid($id_user)
    {
        $this->_id_user = $id_user;
    }

    public function setAll($title,$image,$content,$categorie,$id_user,$isValidate)
    {
       
        $this->_title = $title;
        $this->_image= $image;
        $this->_content = $content;
        $this->_categorie = $categorie;
        
        $this->_id_user = $id_user;
        $this->_isValidate=$isValidate;
        
    }
    public function kolchi($id,$title,$image,$content,$categorie)
    {
        $this->_id = $id;

        $this->_title = $title;
        $this->_image= $image;
        $this->_content = $content;
        $this->_categorie = $categorie;
        

        
    }
    
    public function search()
    {
        $_db = new database(); 
        $_db->query("select * from articles where title like '%" . $this->_title . "%'");
        return $_db->one();
    }
    
    public function getAll()
    {
        $_db = new database(); 
        $_db->query("SELECT `articles`.`id` AS `id`, `title`,`image`,`content`, `name`
        FROM `articles` INNER JOIN `categories` 
        ON `categories`.`id` = `articles`.`category` ");
        return $_db->result();
    }

    public function getArticle()
    {
        $_db = new database(); 
        $_db->query("SELECT `articles`.`id` AS `id`, `title`,`image`,`content`, `name`
        FROM `articles` INNER JOIN `categories` 
        ON `categories`.`id` = `articles`.`category` Where isVAlidate=1 AND archive=0");
        return $_db->result();
    }
    public function getarchiveArticle()
    {
        $_db = new database(); 
        $_db->query("SELECT `articles`.`id` AS `id`, `title`,`image`,`content`, `name`
        FROM `articles` INNER JOIN `categories` 
        ON `categories`.`id` = `articles`.`category` Where  archive=1");
        return $_db->result();
    }

    public function getMyArticle()
    {
        $_db = new database(); 
        $_db->query("SELECT `articles`.`id` AS `id`, `title`,`image`,`content`, `name`,`isValidate` 
        FROM `articles` INNER JOIN `categories` 
        ON `categories`.`id` = `articles`.`category` WHERE id_user = " . $this->_id_user . "");
        return $_db->result();
    }

    public function getPendingArticle()
    {
        $_db = new database(); 
        $_db->query("SELECT `articles`.`id` AS `id`, `title`,`image`,`content`, `name`, `id_user`, `username`, isValidate
        FROM `articles` INNER JOIN `categories` 
        ON `categories`.`id` = `articles`.`category` INNER JOIN `users` ON `users`.`id` = `id_user` Where isVAlidate=0");
        return $_db->result();
    }

    public function getOne()
    {
        $_db = new database(); //instanciation
        $_db->query("select * from articles where id=" . $this->_id . "");
        return $_db->one();
    }

    public function add()
    {
        $_db = new database();
        $_db->query("insert into articles (title,image,content,category,id_user,isValidate,date)
                    values ('"  . $this->_title . "','"  . $this->_image . "','"  . $this->_content . "',"  . $this->_categorie . ","  . $this->_id_user . ","  . $this->_isValidate. ",NOW() )");
        $_db->execute();
        return 0;
    }

    public function update()
    {
        $_db = new database(); 
        $_db->query("update articles set id = " . $this->_id . ",
                                                    title= '" . $this->_title . "',
                                                    image= '"  . $this->_image . "',
                                                    content= '"  . $this->_content . "',
                                                    category = '"  . $this->_categorie . "'
                                                    where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }
    public function update_user()
    {
        $_db = new database(); 
        $_db->query("update articles set id = " . $this->_id . ",
                                                    title= '" . $this->_title . "',
                                                    image= '"  . $this->_image . "',
                                                    content= '"  . $this->_content . "',
                                                    category = '"  . $this->_categorie . "',
                                                    isValidate = 0
                                                    where id = "  . $this->_id . "");
        $_db->execute();
        return 0;
    }
    public function valider()
    {
        $_db = new database(); 
        $_db->query("UPDATE articles SET isValidate = 1 WHERE id = " . $this->_id ."");
        $_db->execute();
        return 0;
    }
    public function refuser()
    {
        $_db = new database(); 
        $_db->query("UPDATE articles SET isValidate = -1 WHERE id = " . $this->_id ."");
        $_db->execute();
        return 0;
    }
    public function refuserArticle()
    {
        $_db = new database(); 
        $_db->query("UPDATE articles SET isValidate = -2 WHERE id = " . $this->_id ."");
        $_db->execute();
        return 0;
    }
    public function delete()
    {
        $_db= new database();
        $_db->query("delete from articles where id=" . $this->_id ."");
        $_db->execute();
        return 0;
    }

    public function getcateg()
    {
        $_db = new database(); 
        $_db->query("select * from categories");
        return $_db->result();
    }

    public function getcateg_name()
    {
        $_db = new database(); 
        $_db->query("select * from categories where name='" . $this->_name . "'");
        return $_db->result();
    }
    public function update_archive()
    {
        $_db = new database(); 
        $_db->query("UPDATE articles SET archive = 1 WHERE id = " . $this->_id ."");
        $_db->execute();
        return 0;
    }
    public function unarchive()
    {
        $_db = new database(); 
        $_db->query("UPDATE articles SET archive = 0 WHERE id = " . $this->_id ."");
        $_db->execute();
        return 0;
    }
    
   
}