<?php
session_start();
if(isset($_POST['txt-send'])){
    date_default_timezone_set('Europe/Moscow');
    $rec_name = $_POST['rec-name'];
    $subject = $_POST['subject'];
    $txt_input = $_POST['txt-input'];
    $creation_date = new DateTime();
    $creation_date2 = $creation_date->format('d-m-Y g:i A');
    $sender_name = $_SESSION['user_name'];
    $data_array = [
        $rec_name,
        $sender_name,
        $subject,
        $txt_input
    ];

    $formated_data_array = [
        $to = nl2br("<b>КОМУ: </b>" . $data_array[0] . ";\n"),
        $from = nl2br('<b>ОТ: </b>' . $data_array[1] . ";\n"),
        $sub = nl2br('<b>ТЕМА: </b>' . $data_array[2] . "\n"),
        $sep = nl2br("----------------------------------------\n"),
        $txt = nl2br("<b>СООБЩЕНИЕ: </b>\n" . $data_array[3] . "\n"),
        $sep = nl2br("----------------------------------------\n"),
        $cdate = nl2br('<b>ОТПРАВЛЕНО: </b>' . $creation_date2 . "\n"),

    ];

    $filename = hash('sha256', $rec_name) . rand(1, 123456789) . '.txt';
    $text = str_replace(PHP_EOL, PHP_EOL, $formated_data_array);

    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/private/messages/{$filename}", $text);
    echo('<p style="color: green;">Сообщение пользователю ' . $rec_name . ' успешно отправлено! Дойдет ли оно?</p>');
    header('Refresh: 1; url=/');
}
?>
<?php
if (isset($_SESSION['user_id'])) {
    echo('
    <html>
    <form method="post" action="" name="txt-data">
        <div class="input-form" style="display: inline-block;">
            <input type="text" name="rec-name" placeholder="Кому" style="display: block; margin-top: 10px;" required>
            <input type="text" name="subject" placeholder="Тема" style="display: block; margin-top: 10px;" required>
            <textarea name="txt-input" id="txt-input" cols="30" rows="10" style="margin-top: 10px;" placeholder="Введите сообщение здесь" required></textarea>
        </div>
        <br>
        <button type="submit" name="txt-send" value="txt-send" style="margin-top: 50px;">SEND</button>
    </form>
    <a href="index">На главную</a>
    </html>
');
}else{
    echo '<h1 style="color: red;">Войдите в свой аккаунт для создания сообщения</h1>';
}
?>