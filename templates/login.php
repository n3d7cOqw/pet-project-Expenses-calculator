<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="/static/styles/style.css">

</head>
<body>
<div class="container">
<a href="index.php" class="back-button">На главную</a>
    <form action="/src/actions/login.php" method="POST">
        <div class="form-container" id="login-form">
            <h2>Вход</h2>
            <input type="text" name="name" "Имя пользователя" required><br>
            <input type="password" name="password" placeholder="Пароль" required><br>
            <button>Войти</button>
        </div>
    </form>
</div>
</body>
</html>
