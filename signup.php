<?php
session_start();
include('private/cfg.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    //$query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">Этот ник уже занят!</p>';
    }
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users(username,password) VALUES (:username,:password_hash)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->execute();
        if ($query) {
            echo '<p class="success">Регистрация прошла успешно!</p>';
            echo 'Регистрация прошла успешно. Сейчас вы будете перенаправлены на страницу авторизации...';
            header('Refresh: 1; url=/signin');
        } else {
            echo '<p class="error">Неверные данные!</p>';
        }
    }
}
?>

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
<div class="reg-form" style="text-align: center; margin-top: 10%">
    <h1>Регистрация</h1>

    <form method="post" action="" name="signup-form">
        <div class="form-element">
            <label>Придумайте логин</label><br>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Придумайте пароль</label><br>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="register" value="register">Зарегистрироваться</button>
    </form>
    <p><a href="signin">У меня уже есть аккаунт</a></p>
</div>