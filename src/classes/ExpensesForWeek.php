<?php
session_start();
require_once __DIR__ . "/Expenses.php";
require_once __DIR__ . "/../../static/db_cfg.php";

class ExpensesForWeek implements Expenses{

    public function connectDB():object{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        return $pdo;
    }
    protected $pdo;
    public function updateExpense(string $name, string $kind, int $expense, string $owner):void{
        $sql = "INSERT INTO `expenses` (name, kind, expense, time, owner)  VALUES (:name, :kind, :expense, :time, :owner)";
        $stnt = $this->pdo->prepare($sql);
        $stnt->execute([
            "name" => $name,
            "kind" => $kind,
            "expense" =>$expense,
            "time" => date("o-m-d G:i:s"),
            "owner" => $_SESSION["owner"],
        ]);
    }
    public function getExpenses(string $owner):array{
        $sql = "SELECT * from expenses where owner = :owner";
        $stnt = $this->pdo->prepare($sql);
        $stnt->execute(["owner" => $_SESSION["owner"]]);
        $data = $stnt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function outExpenses(){
        $expenses = $this->getExpenses($_SESSION["owner"]);
        $items = [];
        foreach($expenses as $item){
            if(date("Y W", strtotime($item["time"])) == date("Y W")){
                
                $items[] = $item;
            }
        }
        for($i = 0; $i < count($items); $i++){
        echo '
            <tr>
                <th>'. date("h:m  j F", strtotime($items[$i]["time"])).'</th>
                <th>'. $items[$i]["kind"].'</th>
                <th>'. $items[$i]["name"].'</th>
                <th>'. $items[$i]["expense"].'</th>
            </tr>
        ';
        }
        echo "<tr>
        <th colspan='4'>Всего потрачено: " . $this->calcExpenses($items) . " гривен</th>
        </tr>";
    }

    public function calcExpenses($obj):int{
        $sum = 0;
        foreach($obj as $item){
            $sum += $item["expense"];
        }
        return $sum;
    }
    public function __construct(){
        $this->pdo = $this->connectDB();
    }

    
}