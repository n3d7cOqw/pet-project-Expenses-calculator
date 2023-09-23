<?php
    session_start();
    require_once "src/classes/Db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/style.css">
    <title>Управление затратами</title>
</head>
<body>
    
    <div class="container">
        <div class="menu">
            <?php
            if(!isset($_SESSION["id"])){
                echo '
                <a href="login" id="login-link">Вход</a>
                <a href="register" id="register-link">Регистрация</a>
                ';
            }else{
                echo '
                <a href="logout" id="logout-link">Выйти из аккаунта</a>
                ';
            }
            ?>
        </div>
        <h1>Управление затратами</h1>
        
        <!-- <div class="currency-select">
            <label for="currency">Выберите валюту:</label>
            <select name="currency" id="currency">
                <option value="UAH">UAH</option>
                <option value="usd">USD</option>
                <option value="eur">EUR</option>
            </select>
        </div> -->

        <div class="expenses">
            <a href="expenses-for-year" class="expense">Затраты за год</a>
            <a href="expenses-for-month" class="expense">Затраты за месяц</a>
            <a href="expenses-for-week" class="expense">Затраты за неделю</a>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" id="closeModal">X</span>
        <p>Войдите в аккаунт для просмотра вашей статистики</p>
        </div>
    </div>

    <script>
    const expenses = document.querySelector(".expenses");
    const closeModal = document.getElementById("closeModal");
    if(document.getElementById("login-link")){
    expenses.addEventListener("click", (e)=>{
        if(e.target.classList.contains("expense")){
            e.preventDefault();
            document.querySelector(".modal").style.visibility = "visible";
            document.querySelector(".container").style.visibility = "hidden";
        }
    });
    closeModal.addEventListener("click", (e)=>{
        document.querySelector(".modal").style.visibility = "hidden";
        document.querySelector(".container").style.visibility = "visible";
    })
}
    </script>
</body>
</html>