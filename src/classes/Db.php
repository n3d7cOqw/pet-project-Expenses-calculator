<?php
require_once __DIR__ . "/../../static/db_cfg.php";
class Db{

    public $db;

    public function __construct($dbName, $dbHost, $dbUser, $dbPassword){
        $this->db = new PDO("mysql:dbname=".$dbName.";host=" .$dbHost, $dbUser, $dbPassword);
    }

    public function addUser(string $name, string $password):void{
        $password = sha1($password);
        $sql = "INSERT INTO users(name, password) VALUES (:name, :password)";
        $stnt = $this->db->prepare($sql);
        $stnt->execute([
            "name" => $name,
            "password" => $password
        ]);
    }

    public function selectUser(int|string $value):array|bool{
        if(is_integer($value)){
            $sql = "SELECT * FROM users WHERE id = :id ";
        }else{
            $sql = "SELECT * FROM users WHERE name = :name ";
        }
        $stnt = $this->db->prepare($sql);
        if(is_integer($value)){
            $stnt->execute(["id" => $value]);
        }else{
            $stnt->execute(["name" => $value]);
        }
        return $stnt->fetch(PDO::FETCH_ASSOC);
    }

    
}

$pdo = new Db(DB_NAME, DB_HOST, DB_USER, DB_PASSWORD);
