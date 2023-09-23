<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/style.css">
    <title>Регистрация</title>
</head>
<body>
<div class="container">
<form action="/src/actions/register.php" method="POST">
    <a href="index.php" class="back-button">На главную</a>
        <div class="form-container" id="register-form">
            <h2>Регистрация</h2>
            <input type="text" name="name" placeholder="Имя пользователя" required><br>
            <input type="password" name="password" placeholder="Пароль" required><br>
            <input type="password" name="repeat_password" placeholder="Повторите пароль" required><br>
            <button>Зарегистрироваться</button>
        </div>
</div>
</form>
</body>
</html>
