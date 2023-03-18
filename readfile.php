<?php
session_start();
$uname = "";
if (!isset($_SESSION['user_id'])) {
    echo 'f';
} else {
    $hashed_user_name = hash('sha256', $_SESSION['user_name']);
    $txts = glob('/private/messages/' . $hashed_user_name . '*.txt');
    if (count($txts) > 0) {
        var_dump($txts);
        echo '
            <form action="" method="POST">
                <!--<button type="submit" name="download-txts" value="download-txts">Скачать первое сообщение</button>-->
            </form> 
            ';
    } else {
        echo 'У вас нет новых сообщений';
    }
}
