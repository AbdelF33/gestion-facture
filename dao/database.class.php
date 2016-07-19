<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author Abdel
 */
class database {
    //put your code here
    private $user;
    private $password;
    private $db;
    private $host;
    protected $pdo;

    protected $message;

    function message(){
        return $this->message;
    }

    function __construct($host, $db, $user, $password){
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;

    }

    function connect(){
        try{
            $this->pdo = new PDO("mysql:dbname=".$this->db.";host=".$this->host, $this->user, $this->password);
        }
        catch(PDOException $e){
            $this->message = "Erreur de connexion au serveur :<br>".$e->getMessage()."<br>";
            return false;
        }
        return true;
    }
    
    // echape les quotes dans les chaines de caractères
    function eq($content){
        //(condition ? si vrai : si faux)
        return (isset($content) ? "'".str_replace("'", "\'", $content)."'" : "NULL");
    }

}

?>
