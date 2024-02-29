<?php
class BddConnect{
    public $connexion;


    public function __construct($bdd) {
        $dsn = "mysql:host=localhost;dbname=$bdd";
        $username = "root";
        $password = "";
        $this->connexion = new PDO($dsn, $username, $password);
        $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "vous êtes connecté à la bdd";
    }

    public function createTable($table){
        $sql = "DROP TABLE IF EXISTS $table ; CREATE TABLE $table (id int AUTO_INCREMENT NOT NULL, nom VARCHAR(255), PRIMARY KEY (id) ) ENGINE=InnoDB;";
        $this->connexion->query($sql);
    }
}

$bddConnect = new BddConnect("injection");

$bddConnect->createTable("users");


?>