<?php
require_once __DIR__ . "/../classes/Db.php";
require_once __DIR__ . "/../helpers.php";

$name = $_POST["name"];
$password = $_POST["password"];
var_dump($password != $_POST["repeat_password"]);
if(!validate($name) or !validate($password) or $password != $_POST["repeat_password"]){
    redirect("/register");
}

$pdo->addUser($name, $password);
redirect("/login");