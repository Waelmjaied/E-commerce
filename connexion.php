<?php

require_once("dbconfig.php");
//require_once("logout.php");

class Connexion
{ 	
    private static $instance;
    private $cnx=null;
    private function __construct()
    { 
        // Create the database connection
        try {
            $dsn = "mysql:host=".HOST.";dbname=".BASE;
            $this->cnx = new PDO($dsn, USER, PASS);
            // Set PDO error mode to exception
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit(); // Terminate script if connection fails
        }
    }

    static function getInstance()
    { 
        if(!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnexion()
    { 
        return $this->cnx;
    }
}

?>