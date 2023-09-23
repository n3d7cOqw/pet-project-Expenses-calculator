<?php

require "src/helpers.php";
if(isset($_SERVER["REDIRECT_URL"])){
    $route = $_SERVER["REDIRECT_URL"];
    $route = explode("/", $route);
}else{
    $route = null;
}



switch($route){
    case null:
        require_once "templates/main.php";
        break;  
    case $route[1] == "register":
        require_once "templates/register.php";
        break;
    case $route[1] == "login":
        require_once "templates/login.php";
        break;
    case $route[1] == "logout":
        require_once "src/actions/logout.php";
        break;
    case $route[1] == "expenses-for-month":
            require_once "templates/expenses_for_month.php";
            break;
    case $route[1] == "src" and $route[2] == "actions" and $route[3] == "expense_for_month.php":
        require_once "src/actions/expenses_for_month.php";
        break;
    case $route[1] == "expenses-for-year":
            require_once "templates/expenses_for_year.php";
            break;
    case $route[1] == "src" and $route[2] == "actions" and $route[3] == "expense_for_year.php":
        require_once "src/actions/expenses_for_year.php";
        break;
    case $route[1] == "expenses-for-week":
            require_once "templates/expenses_for_week.php";
            break;
    case $route[1] == "src" and $route[2] == "actions" and $route[3] == "expense_for_week.php":
        require_once "src/actions/expenses_for_week.php";
        break;
    default:
        print_r($route);
        require_once "templates/404.php";
}

