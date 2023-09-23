<?php
session_start();

require_once __DIR__ . "/../classes/Db.php";
require_once __DIR__ . "/../helpers.php";

$name = $_POST["name"];
$password = $_POST["password"];

try{
    $user = $pdo->selectUser($name);
}catch (Exception $e){
    redirect("/login");
}
if($user === false and $user["password"] != sha1($password)){
    redirect("/login");
}

$_SESSION["id"] = $user["id"];
$_SESSION["owner"] = $user["name"];
redirect("/");
