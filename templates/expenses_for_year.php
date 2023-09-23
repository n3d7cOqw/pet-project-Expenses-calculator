<?php
session_start();
require_once __DIR__ . "/../src/classes/ExpensesForYear.php";
$expense = new ExpensesForYear();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление расходами за год</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .expenses {
            max-width: 800px;
            margin: auto;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .expenses-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .expenses-table th, .expenses-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .expenses-form {
            max-width: 400px;
            margin: 20px auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .expenses-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #333;
        }

        .expenses-form input, .expenses-form select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .expenses-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007BFF;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .expenses-form button:hover {
            background: #0056b3;
        }
        .return-button {
            position: fixed;
            top: 10px;
            left: 10px;
            background-color: #ffffff;
            border: 1px solid #cccccc;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            color: #333333;
            font-weight: bold;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .return-button a {
            text-decoration: none;
            color: #333333;
            font-weight: bold;
        }

        .return-button:hover {
            background-color: #f0f0f0;
        }
    </style>

</head>
<body>
<div class="return-button">
    <a href="/">Вернуться на главную</a>
</div>
    <div class="expenses">
        <h1>Расходы за год</h1>
        
        <table class="expenses-table">
            <tr>
                <th>Дата</th>
                <th>Вид</th>
                <th>Описание</th>
                <th>Сумма</th>
            </tr>
            <?php
            $expense->outExpenses();
            ?>
        </table>

        <form class="expenses-form" method="post" action="../src/actions/expenses_for_year.php">
            <label for="description">Описание</label>
            <input type="text" name="name" id="description" name="description" required><br>

            <select name="kind" id="">
                <?php 
                $categories = [
                    'Продукты и еда',
                    'Транспорт',
                    'Жилье',
                    'Здоровье',
                    'Развлечения',
                    'Личные расходы',
                    'Финансовые',
                    'Образование',
                    'Бизнес и работа',
                    'Прочее'
                ];
                foreach ($categories as $cat){
                    echo '<option value="'. $cat .'">'. $cat .'</option>';
                }
                ?>
            </select>

            <label for="amount">Сумма</label>
            <input type="number" id="amount" name="expense" min="0.01" step="0.01" required><br>

            <button type="submit">Добавить расход</button>
        </form>
    </div>
</body>
</html>
