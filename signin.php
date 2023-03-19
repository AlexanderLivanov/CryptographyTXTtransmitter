<?php
session_start();
include('private/cfg.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Неверные пароль или имя пользователя!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_name'] = $username;
            echo '<p class="success">Поздравляем, вы прошли авторизацию!</p><p><a href="index">На главную</a></p>';
            header('Refresh: 1; url=/');
        } else {
            echo '<p class="error" style="color: red;"> Неверные пароль или имя пользователя!</p>';
            header('Refresh: 1; url=/signin');
        }
    }
}

?>

<head>
    <style>
        h1 {
            font-size: 36px;
        }
        .form-element,
        input,
        button {
            margin: 10px;
            font-family: 'Courier New', Courier, monospace;
        }

        .form-element input {
            outline: none;
            border: none;
            border-bottom: 2px solid #333;
            transition: all 0.6s;
        }

        button {
            font-size: 20px;
            outline: none;
            border: none;
            border-bottom: 2px solid #333;
        }

        a {
            font-size: 16px;
            color: #333;
            text-decoration: none;
            border-bottom: 2px dotted #333;
        }
    </style>
</head>

<div class="auth-form" style="text-align: center; margin-top: 10%">
    <h1>Вход в систему</h1>
    <form method="post" action="" name="signin-form">
        <div class="form-element">
            <label>Логин</label><br>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required placeholder="логин" />
        </div>
        <div class="form-element">
            <label>Пароль</label><br>
            <input type="password" name="password" required placeholder="пароль"/>
        </div>
        <button type="submit" name="login" value="login">Войти</button>
        <p><a href="signup">Ещё нет аккаунта? Зарегистрируйтесь!</a></p>
    </form>
</div>