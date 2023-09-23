<?php
session_start();
require_once __DIR__ . "/../classes/ExpensesForMonth.php";
require_once __DIR__ . "/../helpers.php";
$expenses = new ExpensesForMonth();
$expenses->updateExpense($_POST["name"], $_POST["kind"], $_POST["expense"], $_SESSION["owner"]);
redirect("/../../expenses-for-month");
?>