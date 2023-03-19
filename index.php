<?php
require_once('special/header.php');
require_once('special/message-box.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="/special/jquery-3.2.1.min.js"></script>
</head>

<body>
    <div class="super-block">
        <div class="list">
            <ul class="nav">
                <?php
                if (isset($_SESSION['user_id'])) {
                    for ($n = 0; $n < count($txts); $n++) {
                        // echo ("<li><a href='readfile?" . $n . "' id='" . $n . "' onclick='show()''>" . rtrim(mb_strimwidth($txts[$n], strlen($txts[$n]) - 15, strlen($txts[$n]))) . '' . "\r\n" . "</a></li>");
                        echo ("<li><a href='#' id='" . $n . "' onclick='showTXT(" . $n  . ")'>" . rtrim(mb_strimwidth($txts[$n], strlen($txts[$n]) - 15, strlen($txts[$n]))) . '' . "\r\n" . "</a></li>");
                    }
                } else {
                    echo '<h2 style="color: #f7f7f7; margin: 10px; text-decoration: underline;">Переписка доступна только зарегистрированным пользователям</h2>';
                }
                ?>
            </ul>
        </div>
        <div class="message-box">
            <div id="message-text">

            </div>
        </div>
    </div>
    <script>
        var param;
        function showTXT(param) {
            $.ajax({
                url: 'readfile?' + param,
                success: function(data) {
                    $('#message-text').html(data);
                }
            });
        };
    </script>

</body>