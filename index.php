<?php
require_once('special/header.php');
require_once('special/message-box.php');
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="super-block">
        <div class="list">
            <ul class="nav">
                <?php
                if (isset($_SESSION['user_id'])) {
                    for ($n = 0; $n < count($txts); $n++) {
                        echo ("<li><a href='#'>" . rtrim(mb_strimwidth($txts[$n], strlen($txts[$n]) - 15, strlen($txts[$n]))) . '' . "\r\n" . "</a></li>");
                    }
                } else {
                    echo '<h2 style="color: #f7f7f7; margin: 10px; text-decoration: underline;">Переписка доступна только зарегистрированным пользователям</h2>';
                }
                ?>
            </ul>
        </div>
        <div class="message-box">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore dolorum iusto facere. Optio laborum, aut voluptatem facilis dignissimos pariatur eligendi veritatis voluptas enim quas! Deleniti aperiam placeat doloremque ab necessitatibus.
        </div>
    </div>
</body>